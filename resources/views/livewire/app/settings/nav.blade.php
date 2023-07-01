<nav class="p-2 shadow-sm navbar-expand-lg rounded mb-3 px-3 navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
    <ul class="navbar-nav nav-dark">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('user.settings.user') ? 'active' : '' }}" aria-current="page" href="{{ route('user.settings.user') }}">User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('user.settings.password') ? 'active' : '' }}" aria-current="page" href="{{ route('user.settings.password') }}">Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('user.settings.profile') ? 'active' : '' }}" aria-current="page" href="{{ route('user.settings.profile') }}">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('user.settings.avatar') ? 'active' : '' }}" aria-current="page" href="{{ route('user.settings.avatar') }}">Avatar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('user.settings.preferences') ? 'active' : '' }}" aria-current="page" href="{{ route('user.settings.preferences') }}">Preferences</a>
        </li>
    </ul>
</nav>