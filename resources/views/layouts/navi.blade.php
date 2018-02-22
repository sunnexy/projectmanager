<header id="header">
    <nav class="navbar navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/pmanager">P-Manager</a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    @if(Auth::user()->role_id == 1)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i> Admin <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('users.index') }}">All Users</a></li>
                                <li><a href="{{ route('companies.all') }}">All Companies</a></li>
                                <li><a href="{{ route('projects.all') }}">All Projects</a></li>
                                <li><a href="{{ route('tasks.all') }}">All Tasks</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::check())
                    <li class="active"><a href="/pmanager/profile">{{Auth::user()->name}}</a></li>
                    @endif
                    <li><a href="{{ route('companies.index') }}">My Companies</a></li>
                    <li><a href="{{ route('projects.index') }}">My Projects</a></li>
                    <li><a href="{{ route('tasks.index') }}">My Tasks</a></li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->