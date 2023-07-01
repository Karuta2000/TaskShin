<li class="nav-item dropstart">
    <a class="nav-link btn dropdown-toggle shadow-sm btn-nav-app rounded shadow py-0" href="#"
        id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="d-flex align-items-center">
            @livewire('app.avatar', ['avatar' => Auth::user()->avatar])
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><a class="dropdown-item" href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="{{ route('tags') }}"><i class="fa fa-tags"
            aria-hidden="true"></i> Tags</a></li>
        <li><a class="dropdown-item" href="{{ route('user.settings.user') }}"><i class="fa fa-cog"
                    aria-hidden="true"></i> Settings</a></li>
        <li><a class="dropdown-item" href="{{ route('user.settings.preferences') }}"><i class="fa fa-user"
                    aria-hidden="true"></i> Preferences</a></li>
        <li><a class="dropdown-item"
                href="{{ route('logout') }}"onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i
                    class="fa fa-sign-out" aria-hidden="true"></i> Logout
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </a></li>
    </ul>
</li>
