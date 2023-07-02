<nav class="navbar shadow-lg navbar-expand-lg bg-nav-app px-4 sticky-top">
    <a class="navbar-brand" href="/"><img src="{{ asset('images/icon.png') }}" alt="Bootstrap" width="36"
            height="36"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav mr-auto justify-content-center w-100">

            @livewire('app.navbar.link', ['route' => 'projects', 'icon' => 'flask'])
            @livewire('app.navbar.link', ['route' => 'tasks', 'icon' => 'check-square'])
            @livewire('app.navbar.link', ['route' => 'notes', 'icon' => 'sticky-note-o'])
            @livewire('app.navbar.link', ['route' => 'dashboard', 'icon' => 'home'])
            @livewire('app.navbar.link', ['route' => 'gallery', 'icon' => 'picture-o'])

            <li class="nav-item">
                <a class="nav-link btn btn-lg py-2 px-3 me-2 fs-5 bg-black shadow-sm btn-nav-app disabled"
                    href="#"><i class="fa fa-search" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @livewire('app.navbar.user')
        </ul>
    </div>
</nav>
