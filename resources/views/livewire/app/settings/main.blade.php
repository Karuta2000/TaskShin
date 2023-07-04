<div>

    @livewire('app.settings.nav', [
        'pages' => $pages,
        'activePage' => $activePage,
    ])

    @foreach ($pages as $page)
        @if ($page == $activePage)
            <div class="row justify-content-center">
                <div class="col-md-10 card py-5 shadow">
                    @livewire('app.settings.' . $page, [], key($page))
                </div>
            </div>
        @endif
    @endforeach
</div>
