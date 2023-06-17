<nav class="navbar shadow navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('dashboard') }}"><img
            src="https://cdn-icons-png.flaticon.com/512/671/671164.png" width="30" height="30"
            class="d-inline-block align-top" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Přehled</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('projects') }}">Projekty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tasks') }}">Úkoly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notes') }}">Poznámky</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tags') }}">Tagy</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="btn btn-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{Auth::user()->profile_photo_path}}" class="rounded-circle avatar pe-3" style="width: 50px" alt="Profile Avatar"> 
                    {{ Auth::user()->name }}
                  </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('user.settings') }}">Nastavení</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        Odhlásit
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
