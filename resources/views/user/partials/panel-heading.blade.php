<div class="panel-heading">
    <a class="btn btn-primary" href="{{ route('getSendMessage', $mailbox->id) }}">Написать письмо</a>
    <a class="btn btn-danger" href="{{ route('getDropUserMailbox', $mailbox->id) }}">Удалить почтовый ящик</a>
</div>