<nav class="navbar shadow-lg navbar-expand-lg bg-nav-app px-4 sticky-top">
    <a class="navbar-brand" href="/"><img src="{{ asset('images/icon.png') }}" alt="Bootstrap" width="36"
            height="36"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav mr-auto justify-content-center w-100">

            <li class="nav-item">
                <a class="nav-link btn btn-lg py-2 px-3 me-2 fs-5 bg-black shadow-sm btn-nav-app rounded {{ Route::is('projects') ? 'active' : '' }}"
                    href="{{ route('projects') }}"><i class="fa fa-flask" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-lg py-2 px-3 me-2 fs-5 bg-black shadow-sm btn-nav-app rounded {{ Route::is('tasks') ? 'active' : '' }}"
                    href="{{ route('tasks') }}"><i class="fa fa-check-square" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-lg py-2 px-3 me-2 fs-5 bg-black shadow-sm btn-nav-app rounded {{ Route::is('notes') ? 'active' : '' }}"
                    href="{{ route('notes') }}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-lg py-2 px-3 me-2 fs-5 bg-black shadow-sm btn-nav-app rounded {{ Route::is('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-lg py-2 px-3 me-2 fs-5 bg-black shadow-sm btn-nav-app rounded {{ Route::is('tags') ? 'active' : '' }}"
                    href="{{ route('tags') }}"><i class="fa fa-tags" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-lg py-2 px-3 me-2 fs-5 bg-black shadow-sm btn-nav-app rounded {{ Route::is('gallery') ? 'active' : '' }}"
                    href="{{ route('gallery') }}"><i class="fa fa-picture-o" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-lg py-2 px-3 me-2 fs-5 bg-black shadow-sm btn-nav-app disabled"
                    href="#"><i class="fa fa-search" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropstart">
                <a class="nav-link btn dropdown-toggle shadow-sm btn-nav-app rounded shadow" href="#"
                    id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        @livewire('app.avatar', ['avatar' => Auth::user()->avatar ])
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-left">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('user.settings.user') }}"><i class="fa fa-cog"
                                aria-hidden="true"></i> User Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.settings.password') }}"><i
                                class="fa fa-unlock-alt" aria-hidden="true"></i> Password Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.settings.profile') }}"><i class="fa fa-user"
                                aria-hidden="true"></i> Profile Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.settings.avatar') }}"><i class="fa fa-user"
                                aria-hidden="true"></i> Avatar Settings</a></li>
                    <li><a class="dropdown-item"
                            href="{{ route('logout') }}"onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                                class="fa fa-sign-out" aria-hidden="true"></i> Logout
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
