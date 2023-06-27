@extends('app')

@section('content')
    <h1>User settings</h1>

    <nav class="p-2 shadow-sm navbar-expand-lg rounded mb-3 px-3 navbar bg-dark border-bottom border-bottom-dark"
        data-bs-theme="dark">
        <ul class="navbar-nav nav-dark">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('user.settings.user') }}">User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('user.settings.password') }}">Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('user.settings.profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('user.settings.avatar') }}">Avatar</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card py-5 shadow">
                <form method="POST" action="{{ route('user.update.profile') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">

                        <label for="banner" class="col-md-4 col-form-label text-md-right">{{ __('Banner') }}</label>

                        <div class="col-md-6">
                            <input id="banner" type="text" class="form-control @error('banner') is-invalid @enderror"
                                name="banner" value="{{ old('banner', auth()->user()->profile->banner) }}" autocomplete="banner"
                                autofocus>

                            @error('banner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>

                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="male" value="Male" {{ auth()->user()->profile->sex == 'Male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="female" value="Female" {{ auth()->user()->profile->sex == 'Female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="other" value="Other" {{ auth()->user()->profile->sex == 'Other' ? 'checked' : '' }}>
                                <label class="form-check-label" for="other">Other</label>
                            </div>
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
