@extends('layouts.app.profile')

@section('content')
    <div class="row justify-content-center m-0">
        <div class="profile-container p-0">
            <div class="profile-banner" style="background-image: url('{{ $user->profile->banner }}')"></div>
            <img src="{{ $user->avatar }}" alt="Avatar" class="img-fluid rounded-circle oval-avatar shadow-lg">
            <div class="profile-info rounded p-3 shadow container w-auto">
                <h1 class="profile-nickname">{{ $user->name }}</h1>
                <p>Sex: <span>{{ $user->profile->sex }}</span></p>
                <p>Email: <span>{{ $user->email }}</span></p>
            </div>
        </div>
    </div>
@endsection
