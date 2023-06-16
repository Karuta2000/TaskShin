@extends('layout')

@section('content')
    <div class="row mb-3 p-3">
        <div class="col">
            <h1>Vaše projekty</h1>
        </div>
        <div class="col-md-6">
            <a href="{{ route('projects.create') }}" class="btn btn-primary float-right">Přidat projekt</a>
        </div>
    </div>

    <div class="row">
        @foreach ($projects as $project)
            <div class="col-md-3 mb-3">
                <div class="card shadow-lg" style="background-color: #{{ $project->color }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        @isset($project->description)
                        <p class="card-text">{{ $project->description }}</p>
                        @else
                        <p class="card-text">Bez popisku</p>
                        @endisset
                        
                        @if($project->tasks->count() > 0)
                        <p class="card-text">Úkoly: {{ $project->tasks->where('completed', 1)->count() }}/{{$project->tasks->count()}} ({{ $project->tasks->where('completed', 1)->count()/($project->tasks->count())*100 }}%)</p>
                        @else
                        <p class="card-text">Žádné úkoly</p>
                        @endif
                        @if($project->notes->count() > 0)
                        <p class="card-text">Poznámky: {{ $project->notes->count() }}</p>
                        @else
                        <p class="card-text">Bez poznámek</p>
                        @endif
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">Zobrazit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
