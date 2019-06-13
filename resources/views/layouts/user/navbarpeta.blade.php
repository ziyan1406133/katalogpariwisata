<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/">Peta Pariwisata Kabupaten Garut</a>
    
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    
    <ul class="navbar-nav ml-auto ml-auto mr-0 mr-md-3 my-2 my-md-0">
        @auth
        <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{auth()->user()->username}}&nbsp;
            <img class="rounded-circle" tyle="float:right;" width="20px" src="/storage/images/avatar/{{auth()->user()->foto}}">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="/admin">Dashboard</a>
            <a class="dropdown-item" href="/user/{{auth()->user()->id}}">Profil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        </li>
        @endauth
        @guest
        <a class="nav-link" href="/login">
            Login Admin
        </a>
        @endguest
    </ul>
    
</nav>
        