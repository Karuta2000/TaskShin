@extends('app')

@section('content')
    <h1>User settings</h1>

    @livewire('app.settings.nav')

    @livewire('app.settings.preferences')

@endsection
