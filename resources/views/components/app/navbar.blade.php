<nav class="navbar shadow-lg navbar-expand-lg navbar-dark bg-dark px-3 sticky-top">
    <a class="navbar-brand" href="/"><img src="{{ asset('images/icon.png') }}" alt="Bootstrap" width="36"
            height="36"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav mr-auto justify-content-center w-100">
            <li class="nav-item">
                <a class="nav-link btn shadow-lg py-2 px-3 me-2 bg-black" href="{{ route('dashboard') }}">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn py-2 px-3 me-2 bg-black" href="{{ route('projects') }}"><i class="fa fa-flask"
                        aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn py-2 px-3 me-2 bg-black" href="{{ route('tasks') }}"
                    style="background-color: #0C0F0A;"><i class="fa fa-check-square" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn py-2 px-3 me-2 bg-black" href="{{ route('notes') }}"
                    style="background-color: #0C0F0A;"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn py-2 px-3 me-2 bg-black" href="{{ route('tags') }}"
                    style="background-color: #0C0F0A;"><i class="fa fa-tags" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn py-2 px-3 me-2 bg-black disabled" href="{{ route('tags') }}"
                    style="background-color: #0C0F0A;"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn py-2 px-3 me-2 bg-black disabled" href="#" style="background-color: #0C0F0A;"><i
                        class="fa fa-search" aria-hidden="true"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropstart">
                <a class="nav-link dropdown-toggle bg-dark rounded shadow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <img src="{{ Auth::user()->avatar }}" alt="Avatar"
                                onerror="this.src='{{ asset('images/avatar.png') }}'">
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-left">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('user.settings.user') }}"><i class="fa fa-cog" aria-hidden="true"></i> User Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.settings.password') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Password Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.settings.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> Profile Settings</a></li>
                    <li><a class="dropdown-item"
                            href="{{ route('logout') }}"onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
