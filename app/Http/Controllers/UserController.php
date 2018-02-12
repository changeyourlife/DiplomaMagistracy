<?php

namespace App\Http\Controllers;

use App\Mailbox;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function getControlPanel() {
        $mailboxes = Mailbox::all()->where('id_user', '=', (string)\Auth::user()->id);

        return view('user.pages.controlPanel', ['mailboxes' => $mailboxes]);
    }

    public function getMailbox($id) {
        $mailboxes = Mailbox::all()->where('id_user', '=', (string)\Auth::user()->id);
        $mailbox = Mailbox::find($id);

        return view('user.pages.getMailbox', [
            'mailboxes' => $mailboxes,
            'mailbox' => $mailbox
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
}
