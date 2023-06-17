@extends('layout')


@section('content')
<h1>Poznámky</h1>
    <div class="p-2 shadow-sm rounded bg-dark my-3">
        <a href="{{ route('notes.create') }}" class="btn btn-light">Nová poznámka</a>
    </div>

    <div class="row py-3">
        @foreach ($notes as $note)
            <div class="col-lg-2 col-md-6 col-sm-12">
                <a class="text-decoration-none custom-link" href="{{ route('notes.edit', $note->id) }}">
                    <div class="card note rounded shadow mb-5 mx-auto"
                        style="height: 250px; width: 250px; background-color: #{{ $note->color }}">
                        <div class="card-body p-3">
                            <h5 class="card-title">{{ $note->title }}</h5>
                            <p class="card-body p-0">
                                {{ Illuminate\Support\Str::limit($note->body, 118, '...') }}
                            </p>
                        </div>
                        <div class="card-footer">
                            @if($note->project != null)
                            {{ $note->lastUpdate() }} | {{ $note->project->name }}
                            @else
                            {{ $note->lastUpdate() }} | Bez projektu
                            @endif
                        </div>

                    </div>
                </a>

            </div>
        @endforeach

    </div>
@endsection
