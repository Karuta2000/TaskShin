@extends('layout')


@section('content')
    <div class="row mb-3 p-3">
        <div class="col">
            <h1>Vaše poznámky</h1>
        </div>
        <div class="col-md-6">
            <a href="{{ route('notes.create') }}" class="btn btn-primary float-right">Nová poznámka</a>
        </div>
    </div>

    <div class="row">
        @foreach ($notes as $note)
            <div class="col-lg-2 col-md-6 col-sm-12">
                <a class="text-decoration-none custom-link" href="{{ route('notes.edit', $note->id) }}">
                    <div class="card rounded note p-3 shadow-lg mb-5 mx-auto"
                        style="background-color: #{{ $note->color }}">
                        <h5 class="card-title">{{ $note->title }}</h5>
                        <p class="card-body p-0"> {{ Illuminate\Support\Str::limit($note->body, 160, '...') }}
                        </p>
                    </div>
                </a>

            </div>
        @endforeach

    </div>
@endsection
