<div class="col-md-2 sidebar">
    <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <div class="absolute-wrapper"></div>
        <!-- Menu -->
        <div class="side-menu">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Main Menu -->
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        @php

                                @endphp
                        <li class="{{ Route::currentRouteName() == 'getAdminControlPanel' ? 'active' : '' }}"><a href="{{ route('getAdminControlPanel') }}">Панель
                                управления</a></li>
                        <!-- Dropdown-->
                        <li class="panel panel-default" id="dropdown">
                            <a data-toggle="collapse" href="#dropdown-lvl1">
                                Пользователи<span class="caret"></span>
                            </a>

                            <!-- Dropdown level 1 -->
                            <div id="dropdown-lvl1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li class="{{ Route::currentRouteName() == 'getAdminUsersList' ? 'active' : '' }}"><a href="{{ route('getAdminUsersList') }}">Список пользователей</a>
                                        </li>
                                        <li class="{{ Route::currentRouteName() == 'getAdminAddUser' ? 'active' : '' }}"><a href="{{ route('getAdminAddUser') }}">Добвить нового
                                                пользователя</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'getAdminSettings' ? 'active' : '' }}"><a href="{{ route('getAdminSettings') }}">Настройки</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

        </div>
    </div>
</div>