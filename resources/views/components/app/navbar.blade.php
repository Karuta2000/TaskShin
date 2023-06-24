<nav class="navbar shadow navbar-expand-lg navbar-dark px-3" style="background-color: #0C0F0Aee;">
    <a class="navbar-brand" href="/">TaskShin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link btn p-2 me-2" href="{{ route('dashboard') }}" style="background-color: #0C0F0A;"><i class="fa fa-tachometer" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn p-2 me-2" href="{{ route('projects') }}" style="background-color: #0C0F0A;"><i class="fa fa-flask" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn p-2 me-2" href="{{ route('tasks') }}" style="background-color: #0C0F0A;"><i class="fa fa-check-square" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn p-2 me-2" href="{{ route('notes') }}" style="background-color: #0C0F0A;"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn p-2 me-2" href="{{ route('tags') }}" style="background-color: #0C0F0A;"><i class="fa fa-tags" aria-hidden="true"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle bg-dark rounded shadow" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <img src="{{ Auth::user()->avatar }}" alt="Avatar"  onerror="this.src='{{ asset('images/avatar.png') }}'">
                        </div>
                        <span class="username ms-1">{{ Auth::user()->name }}</span>
                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right"  aria-labelledby="navbarDropdownMenuLink">
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
