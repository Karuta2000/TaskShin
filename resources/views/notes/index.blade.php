@extends('layout')


@section('content')
    <h1>Poznámky</h1>
    <div class="p-2 shadow-sm rounded bg-dark my-3">
        <a href="{{ route('notes.create') }}" class="btn btn-light">Nová poznámka</a>
    </div>

    <div class="row py-3">
        @foreach ($notes as $note)
            @component('components.note-card', ['note' => $note])
            @endcomponent
        @endforeach

    </div>
@endsection
