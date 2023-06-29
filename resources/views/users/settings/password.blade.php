@extends('app')

@section('content')
    <h1>User settings</h1>

    <nav class="p-2 shadow-sm navbar-expand-lg rounded mb-3 px-3 navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
        <ul class="navbar-nav nav-dark">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('user.settings.user') }}">User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('user.settings.password') }}">Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('user.settings.profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('user.settings.avatar') }}">Avatar</a>
            </li>
        </ul>
    </nav>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card py-5 shadow">
                <form action="{{ route('user.update.password') }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('Old password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword"
                                autocomplete="new-password">

                            @error('oldPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('New password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('newPassword') is-invalid @enderror" name="newPassword"
                                autocomplete="new-password">

                            @error('newPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('New password again') }}</label>

                        <div class="col-md-6">
                            <input id="new-password-confirm" type="password" class="form-control"
                                name="newPassword_confirmation" autocomplete="new-password">
                        </div>
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
