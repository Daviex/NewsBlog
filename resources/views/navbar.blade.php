<!-- Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Navbar header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('home') }}">
                <span class="glyphicon glyphicon-book"></span>
                News
            </a>
        </div>

        <!-- Navbar left links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">

                <li class="{{ Request::is('/') || Request::is('home')? 'active' : '' }}">
                    <a href="{{ URL::to('home') }}">Home</a>
                </li>

                @if(count($categories)<=3)

                    @for ($i = 0; $i < count($categories); $i++)
                        <?php $title=$categories[$i]->title?>
                        <li class="{{ Request::is(strtolower($title)) ? 'active' : '' }}">
                            <a href="{{ URL::to(strtolower($title)) }}">{{ucfirst($title)}}</a>
                        </li>
                    @endfor

                @else

                    @for ($i = 0; $i < 3; $i++)
                        <?php $title=$categories[$i]->title?>
                        <li class="{{ Request::is(strtolower($title)) ? 'active' : '' }}">
                            <a href="{{ URL::to(strtolower($title)) }}">{{ucfirst($title)}}</a>
                        </li>
                    @endfor

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Altre sezioni<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @for($i=3;$i<count($categories);$i++)
                                <?php $title=$categories[$i]->title?>
                                <li class="{{ Request::is(strtolower($title)) ? 'active' : '' }}">
                                    <a href="{{ URL::to(strtolower($title)) }}">{{ucfirst($title)}}</a>
                                </li>
                            @endfor
                        </ul>
                    </li>

                @endif
            </ul>

            <!-- Search -->
            <form class="navbar-form navbar-right" role="search" method="post" action="{{  URL::to('search') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="keyword">
                </div>
                <button type="submit" class="btn btn-default">Cerca</button>
            </form>

            <!-- Navbar right links -->
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::check())

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Comandi operatore<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('addNews') ? 'active' : '' }}">
                                <a href='{{ URL::to('addNews') }}'>Aggiungi news</a>
                            </li>
                            <li class="{{ Request::is('addCategory') ? 'active' : '' }}">
                                <a href='{{ URL::to('addCategory') }}'>Aggiungi sezione</a>
                            </li>
                            <li class="{{ Request::is('register') ? 'active' : '' }}">
                                <a href='{{ URL::to('register') }}'>Registra un utente</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href='{{ URL::to('logout') }}'>Logout</a>
                    </li>

                @else

                    <li class="{{ Request::is('login') ? 'active' : '' }}">
                        <a href='{{ URL::to('login') }}'>Log In</a>
                    </li>

                @endif
            </ul>

        </div>

    </div>

</nav>