<div class="row">
    <header id="nav-header" class="clearfix">
        <div class="col-md-5">
            <nav class="navbar-default pull-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas"
                        data-target="#side-menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </nav>
            <input type="text" class="hidden-sm hidden-xs" id="header-search-field"
                   placeholder="Search for something...">
        </div>

        <div class="col-md-7">
            <ul class="pull-right">
                <li id="welcome" class="hidden-xs">Welcome Admin</li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </header>
</div>