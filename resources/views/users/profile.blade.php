@extends('layouts.app.profile')

@section('content')
    <div class="row justify-content-center m-0">
        <div class="profile-container p-0" style="background-color: #{{ $user->profile->color->HEX }}">
            <div class="profile-banner" style="background-image: url('{{ $user->profile->banner }}')"></div>
            <img src="{{ $user->avatar }}" alt="Avatar" class="img-fluid rounded-circle oval-avatar shadow-lg">
            <div class="profile-info p-3 w-auto"
                style="color: {{ $user->profile->color->darkText ? '#0000000' : '#FFFFFF' }}">
                <h1 class="profile-nickname">{{ $user->name }}</h1>
                <hr>
                <div class="row vertical-align-top">
                    <div class="col-md-3">
                        <div class="card pb-5 pt-4 round shadow h-100 profile-card">
                            <h4 class="mb-4">Personal information:</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Email:</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Birthday:</th>
                                        <td>{{ $user->profile->birthDate() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Age:</th>
                                        <td>{{ $user->profile->age() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Registration Date:</th>
                                        <td>{{ $user->registrationDate() }} ({{ $user->sinceRegistration() }})</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sex:</th>
                                        <td>{!! $user->profile->gender() !!}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card px-5 pb-5 pt-4 round shadow h-100 profile-card">
                            <h4 class="mb-4">Description:</h4>
                            {{ $user->profile->description }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card pb-5 pt-4 round shadow h-100 profile-card">
                            <h4 class="mb-4">Statistics:</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Projects:</th>
                                        <td>{{ $user->projects->count() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tasks:</th>
                                        <td>{{ $user->tasks->count() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Notes:</th>
                                        <td>{{ $user->notes->count() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Images:</th>
                                        <td>{{ $user->images->count() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tags:</th>
                                        <td>{{ $user->tags->count() }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                @livewire('managers.note-manager', [
                    'settings' => [
                        'newNote' => false,
                        'panel' => false,
                        'noNotes' => 6,
                    ],
                ])

            </div>


        </div>


    </div>
    </div>
@endsection
