<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="background-color:pink">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Smart-Agri
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if(Auth::check())
            <ul class="nav navbar-nav">
                @if(Auth::user()->type == 1)
                <li><a href="/sales">Buy Goods</a></li>
                <form action="/search" method="POST" role="search" class="navbar-form navbar-left">
                    {{csrf_field()}}
                <div class="form-group">
                <input type="text" class="form-control" name="q" placeholder="Search here">                
                </div>
                <button type="submit" class="btn btn-default">Search</button>
                </form>
                @elseif(Auth::user()->type == 2)
                <li><a href="/sell">Sell Goods</a></li>
                @endif
            </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                @if(Auth::user()->is_admin)
                    <li>
                        <a href="/admin/profile">Admin Panel</a>
                    </li>
                    @endif
                    <li>
                        <a href="/checkout">Cart</a> <!--TODO: add number of items in cart-->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
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
                            @if(Auth::user()->type == 2)
                            <li><a href="/profile/{{auth()->id()}}">{{Auth::user()->name}}</a></li>
                            @endif
                        </ul>
                    </li>
                @endguest
            </ul>
            
        </div>
    </div>
</header>