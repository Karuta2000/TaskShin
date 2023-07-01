<li class="nav-item">
    <a class="nav-link btn py-2 px-3 me-2 fs-5 bg-black shadow-sm btn-nav-app rounded {{ Route::is($route) ? 'active' : '' }}"
        href="{{ route($route) }}"><i class="fa fa-{{ $icon }}" aria-hidden="true"></i>
    </a>
</li>