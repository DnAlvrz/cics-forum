<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <!-- Use any element to open the sidenav 
    <span id="side-nav-button" onclick="openNav()" class="fas fa-bars"></span>
        -->
    <a class="navbar-brand" href="{{route('home')}}">CICS Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline" action="{{route('search')}}" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="query" aria-label="Search">
            <input type="submit" value="Search" class="btn btn-outline-info">
        </form>
        <ul class="navbar-nav" style="margin-left: auto;">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('posts')}}">Discussions <span class="sr-only">(current)</span></a>
            </li>
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->firstname }}
                </a>
                <div class="dropdown-menu" style="margin:0; padding:0;" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('profile', $user=auth()->user())}}">Profile</a>
                    {{-- <a class="dropdown-item" href="#">Settings</a> --}}
                    <div class="dropdown-divider"></div>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <input type="submit" class="dropdown-item" value="Logout">
                    </form>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.user.notifications', auth()->user())}}">
                    <span class="badge badge-info" style="color:#fff;">
                        
                        <i class="fas fa-bell"></i>
                        {{auth()->user()->unreadNotifications->count()}}
                    </span>
                   
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="badge badge-info" style="color:#fff;">
                        <i class="fas fa-envelope"></i>
                        {{auth()->user()->unreadNotifications->count()}}
                    </span>
                </a>
            </li> --}}
            @endauth
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
            @if(!(Request::segment(1) === 'login'))
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" id="login-link" data-target="#login-modal">Login</a>
            </li>
            @endif
            @endguest
    </div>
</nav>
{{-- @if(Request::segment(1) == '')
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Trending</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Lastest</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">News</a>
    </li>

</ul>
@endif --}}
