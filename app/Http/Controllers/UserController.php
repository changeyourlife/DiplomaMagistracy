<?php

namespace App\Http\Controllers;

use App\Incoming;
use App\Mailbox;
use App\Outgoing;
use Illuminate\Http\Request;
use Webklex\IMAP\Client;
use Webklex\IMAP\Message;

class UserController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function getControlPanel() {
        $mailboxes = Mailbox::all()->where('id_user', '=', (string)\Auth::user()->id);

        return view('user.pages.controlPanel', ['mailboxes' => $mailboxes]);
    }

    /*
     * 1. Реализуем сохранение входящих писем, если timestamp последнего входящего больше чем timestamp спец. поля почтового ящика
     * 2. После сохранения входящих писем реализовываем сохранение timestamp последнего входящего письма в спец. поле почтового ящика
     * 3. Проделываем те же самые действия и для исходящих писем.
     * 4. При загрузке страницы с почтовым ящиком берём последнее входящее письмо, и если его timestamp получения больше
     * чем timestamp спец. поля почтового ящика, то загружаем все письма timestamp, которых больше чем то которое в
     * спец. поле почтового ящика, иначе загружаем с базы данных.
     * 5. Проделываем пункт 4 точно также и для исходящих писем.
     */
    public function getMailbox($id) {
        $mailboxes = Mailbox::all()->where('id_user', '=', (string)\Auth::user()->id);
        $mailbox = Mailbox::find($id);
        $inMessages = null;
        $outMessages = null;

        /*
         * Incoming MSG
         */
        $imapConfiguration = "{".$mailbox->host.":".$mailbox->port."/imap/".$mailbox->encryption."}";
        $imapConnection = imap_open($imapConfiguration, $mailbox->username, $mailbox->password);
        $imapListMailboxes = imap_list($imapConnection, $imapConfiguration, '*');

        if (imap_reopen($imapConnection, $imapListMailboxes[0])) {
            if ($mailboxCheck = imap_check($imapConnection)) {
                $messages = imap_fetch_overview($imapConnection, "{$mailboxCheck->Nmsgs}", 0);
                $lastActivity =
                    Incoming::where('id_user', '=', (string)\Auth::user()->id)
                        ->orderBy('udate', 'desc')
                        ->first();
                $lastActivity = !is_null($lastActivity) ? (int)$lastActivity->udate : 0;
                if ($lastActivity < (int)$messages[0]->udate) {
                    $criteria = 'SINCE "'.date("d-M-Y", $lastActivity).'"';
                    $messagesNumber = imap_search($imapConnection, $criteria);
                    $messages = imap_fetch_overview($imapConnection, implode(",", $messagesNumber), 0);
                    foreach ($messages as $message) {
                        $incomeMessage = Incoming::where('uid', '=', $message->uid)
                            ->where('msgno', '=', $message->msgno)
                            ->where('udate', '=', $message->udate)
                            ->first();
                        if (
                        $incomeMessage
                        ) {
                            continue;
                        }
                        $incoming = new Incoming();

                        $incoming->id_user = \Auth::user()->id;

                        preg_match('/<(.*)>/', $message->from, $from);
                        $incoming->from = $from ? $from[1] : $message->from;

                        $incoming->to = $message->to;
                        $incoming->subject = !empty($message->subject) ? $message->subject : 'нет темы';
                        $incoming->msgno = $message->msgno;
                        $incoming->uid = $message->uid;
                        $incoming->udate = $message->udate;

                        $incoming->save();
                    }
                }
            }
        }

        /*
         * Outgoing MSG
         */
        if (imap_reopen($imapConnection, $imapListMailboxes[1])) {
            if ($mailboxCheck = imap_check($imapConnection)) {
                $messages = imap_fetch_overview($imapConnection, "1:{$mailboxCheck->Nmsgs}", 0);
                $lastActivity =
                    Outgoing::where('id_user', '=', (string)\Auth::user()->id)
                        ->orderBy('udate', 'desc')
                        ->first();
                $lastActivity = !is_null($lastActivity) ? (int)$lastActivity->udate : 0;
                if ($lastActivity < (int)$messages[0]->udate) {
                    $criteria = 'SINCE "'.date("d-M-Y", $lastActivity).'"';
                    $messagesNumber = imap_search($imapConnection, $criteria);
                    $messages = imap_fetch_overview($imapConnection, implode(",", $messagesNumber), 0);
                    foreach ($messages as $message) {
                        $outgoing = new Outgoing();


                        $outgoing->id_user = \Auth::user()->id;

                        preg_match('/<(.*)>/', $message->from, $from);
                        $outgoing->from = $from ? $from[1] : $message->from;

                        $outgoing->to = $message->to;
                        $outgoing->subject = !empty($message->subject) ? $message->subject : 'нет темы';
                        $outgoing->msgno = $message->msgno;
                        $outgoing->uid = $message->uid;
                        $outgoing->udate = $message->udate;

                        $outgoing->save();
                    }
                }
            }
        }

        $inMessages = Incoming::all()->where('id_user', '=', (string)\Auth::user()->id);
        $outMessages = Outgoing::all()->where('id_user', '=', (string)\Auth::user()->id);

        return view('user.pages.getMailbox', [
            'mailboxes' => $mailboxes,
            'mailbox' => $mailbox,
            'inMessages' => $inMessages,
            'outMessages' => $outMessages,
        ]);
    }

    public function getAddMailbox() {
        $mailboxes = Mailbox::all()->where('id_user', '=', (string)\Auth::user()->id);

        return view('user.pages.addMailbox', ['mailboxes' => $mailboxes]);
    }

    public function postAddMailbox(Request $request) {
        $this->validate($request, [
            'host' => 'required',
            'port' => 'required|numeric',
            'encryption' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $mailbox = new Mailbox();

        $mailbox->id_user = \Auth::user()->id;
        $mailbox->host = $request->host;
        $mailbox->port = $request->port;
        $mailbox->encryption = $request->encryption;
        $mailbox->username = $request->username;
        $mailbox->password = $request->password;

        $mailbox->save();

        return redirect()->route('getUserControlPanel');
    }

    public function getSendMail($id) {
        $mailboxes = Mailbox::all()->where('id_user', '=', (string)\Auth::user()->id);
        $mailbox = Mailbox::find($id);

        return view('user.pages.getSendMail', [
            'mailboxes' => $mailboxes,
            'mailbox' => $mailbox,
        ]);
    }

    public function getIncomingMessage($id_mailbox, $id_message) {
        $mailboxes = Mailbox::all()->where('id_user', '=', (string)\Auth::user()->id);
        $mailbox = Mailbox::find($id_mailbox);
        $message = Incoming::find($id_message);
        $bodyMessage = null;

        /*
         * Incoming MSG
         */
        $imapConfiguration = "{".$mailbox->host.":".$mailbox->port."/imap/".$mailbox->encryption."}";
        $imapConnection = imap_open($imapConfiguration, $mailbox->username, $mailbox->password);
        $imapListMailboxes = imap_list($imapConnection, $imapConfiguration, '*');

        if (imap_reopen($imapConnection, $imapListMailboxes[0])) {
            if ($mailboxCheck = imap_check($imapConnection)) {
                $structure = imap_fetchstructure($imapConnection, $message->msgno);
                if (isset($structure->parts) && is_array($structure->parts) && isset($structure->parts[1])) {
                    $part = $structure->parts[1];
                    $bodyMessage = imap_fetchbody($imapConnection, $message->msgno, 2);
                    switch ($part->encoding) {
                        # 8BIT
                        case 1:
                            $bodyMessage = quoted_printable_decode(imap_8bit($bodyMessage));
                            break;
                        # BINARY
                        case 2:
                            $bodyMessage = imap_binary($bodyMessage);
                            break;
                        # BASE64
                        case 3:
                            $bodyMessage = imap_base64($bodyMessage);
                            break;
                        # QUOTED-PRINTABLE
                        case 4:
                            $bodyMessage = quoted_printable_decode($bodyMessage);
                            break;
                    }
                }
            }
        }
        imap_close($imapConnection);

        return view('user.pages.getIncomingMessage', [
            'mailboxes' => $mailboxes,
            'mailbox' => $mailbox,
            'message' => $message,
            'bodyMessage' => $bodyMessage,
        ]);
    }

    public function getOutgoingMessage($id_mailbox, $id_message) {
        $mailboxes = Mailbox::all()->where('id_user', '=', (string)\Auth::user()->id);
        $mailbox = Mailbox::find($id_mailbox);
        $message = Outgoing::find($id_message);
        $bodyMessage = null;

        /*
         * Incoming MSG
         */
        $imapConfiguration = "{".$mailbox->host.":".$mailbox->port."/imap/".$mailbox->encryption."}";
        $imapConnection = imap_open($imapConfiguration, $mailbox->username, $mailbox->password);
        $imapListMailboxes = imap_list($imapConnection, $imapConfiguration, '*');

        if (imap_reopen($imapConnection, $imapListMailboxes[1])) {
            if ($mailboxCheck = imap_check($imapConnection)) {
                $structure = imap_fetchstructure($imapConnection, $message->msgno);
                if (isset($structure->parts) && is_array($structure->parts) && isset($structure->parts[1])) {
                    $part = $structure->parts[1];
                    $bodyMessage = imap_fetchbody($imapConnection, $message->msgno, 2);
                    switch ($part->encoding) {
                        # 8BIT
                        case 1:
                            $bodyMessage = quoted_printable_decode(imap_8bit($bodyMessage));
                            break;
                        # BINARY
                        case 2:
                            $bodyMessage = imap_binary($bodyMessage);
                            break;
                        # BASE64
                        case 3:
                            $bodyMessage = imap_base64($bodyMessage);
                            break;
                        # QUOTED-PRINTABLE
                        case 4:
                            $bodyMessage = quoted_printable_decode($bodyMessage);
                            break;
                    }
                }
            }
        }
        imap_close($imapConnection);

        return view('user.pages.getOutgoingMessage', [
            'mailboxes' => $mailboxes,
            'mailbox' => $mailbox,
            'message' => $message,
            'bodyMessage' => $bodyMessage,
        ]);
    }

    public function getDropMailbox($id) {
        $mailbox = Mailbox::find($id);
        $mailbox->delete();

        return redirect()->route('getUserControlPanel');
    }
}