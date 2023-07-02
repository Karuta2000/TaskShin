<div>

    @livewire('app.settings.nav', [
        'pages' => $pages,
        'activePage' => $activePage,
    ])

    @foreach ($pages as $page)
        @if ($page == $activePage)
            @livewire('app.settings.' . $page, [], key($page))
        @endif
    @endforeach
</div>
