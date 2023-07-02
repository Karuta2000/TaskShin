<nav class="p-2 shadow-sm navbar-expand-lg rounded mb-3 px-3 navbar bg-dark border-bottom border-bottom-dark"
    data-bs-theme="dark">
    <ul class="navbar-nav nav-dark">
        @foreach ($pages as $page)
            <li class="nav-item">
                <a class="nav-link {{ $activePage == $page ? 'active' : '' }}" aria-current="page"
                    wire:click="changePage('{{ $page }}')" href="#">{{ $page }}</a>
            </li>
        @endforeach
    </ul>
</nav>
