@extends('app')

@section('content')
    <h1>User settings</h1>

    <nav class="p-2 shadow-sm navbar-expand-lg rounded mb-3 px-3 navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
        <ul class="navbar-nav nav-dark">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('user.settings.user') }}">User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('user.settings.password') }}">Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('user.settings.profile') }}">Profile</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card py-5 shadow">
                <form method="POST" action="{{ route('user.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">


                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email"
                                value="{{ auth()->user()->email }}" disabled>

                        </div>
                    </div>


                    <div class="form-group row">


                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nickname') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', auth()->user()->name) }}" autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                        <div class="col-md-6">
                            <input id="avatar" type="text" class="form-control @error('avatar') is-invalid @enderror"
                                name="avatar" value="{{ old('avatar', auth()->user()->avatar) }}" autocomplete="avatar"
                                autofocus>

                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="password">
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save changes') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
