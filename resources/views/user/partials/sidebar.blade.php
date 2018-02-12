<div class="col-md-2 sidebar">
    <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <div class="absolute-wrapper"></div>
        <!-- Menu -->
        <div class="side-menu">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Main Menu -->
                <ul class="nav">
                    @if(isset($mailboxes))
                        @if(!is_null($mailboxes))
                            @foreach($mailboxes as $mailbox)
                                <li><a href="{{ route('getUserMailbox', $mailbox->id) }}">{{ $mailbox->username }}</a>
                                </li>
                            @endforeach
                        @else
                            <li>Список почтовых ящиков пуст. Добавьте почтовый ящик.</li>
                        @endif
                    @endif
                    <li><a href="{{ route('getUserAddMailbox') }}" class="btn btn-info">Добавить почтовый ящик</a></li>
                </ul>
            </nav>

        </div>
    </div>
</div>