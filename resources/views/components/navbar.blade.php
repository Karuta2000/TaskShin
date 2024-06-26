<nav class="navbar shadow navbar-expand-lg navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="/">TaskShin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/changelog">Changelog</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Registration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.google') }}"><i class="fa fa-google" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>
</nav>
