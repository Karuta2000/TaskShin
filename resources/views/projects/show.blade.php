@extends('layouts.app.project')

@section('content')
    <div class="row justify-content-center m-0 w-100 bg-gradient">
        <div class="project-container p-0" style="background-color: #{{ $project->color->HEX }}">
            <div class="project-banner"
                style="{{ $project->banner != null ? 'background-image: url(\'' . $project->banner . '\')' : '' }}"></div>

            <div>
                <img src="{{ $project->image }}" class="img-fluid shadow-lg project-image mt-5" style="z-index: 2; position: relative"
                    onerror="this.src='{{ asset('images/homepagewallpaper.jpg') }}'">
                <h1 class="project-title" style="color: {{ $project->color->darkText ? '#000000' : '#FFFFFF' }}">
                    {{ $project->name }}</h1>


                <div class="project-info p-3 w-auto">
                    <div class="mb-3">
                        @foreach ($project->tags as $tag)
                            <a class="btn badge p-2 text-dark shadow-sm"
                                style="background-color: #{{ $tag->color->HEX }}; color:  {{ $tag->color->darkText ? '#000000' : '#FFFFFF' }}">{{ $tag->name }}</a>
                        @endforeach
                        <a class="btn badge bg-primary p-2 text-light shadow-sm" data-toggle="modal"
                            data-target="#addTagModal">Set tags</a>
                    </div>
                    <div class="card p-3 w-75 mx-auto shadow rounded" style="justify-content: start !important">
                        @isset($project->description)
                            {{ $project->description }}
                        @else
                            No description
                        @endisset
                    </div>

                </div>

                <div class="mb-5 container-fluid">
                    <h2 style="color: {{ $project->color->darkText ? '#000000' : '#FFFFFF' }}">Tasks</h2>

                    @livewire('task-manager', ['project' => $project])
                </div>

                <div class="mb-5 container-fluid">
                    <h2 style="color: {{ $project->color->darkText ? '#000000' : '#FFFFFF' }}">Notes</h2>

                    @livewire('note-manager', ['project' => $project])
                </div>


                <div>

                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning me-2"><i
                            class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteProjectModal"><i
                            class="fa fa-trash" aria-hidden="true"></i>
                        Delete</button>
                </div>


            </div>
            {{ $project->lastUpdate() }}
        </div>

    </div>


    <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="addTagModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="addTaskModalLabel">Přidat nový tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-2 modal-text">Označte všechny tagy, které potřebujete:</div>
                    <form action="{{ route('tags.attachToProject', $project->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <select class="form-select" name="tag_ids[]" id="" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Nastavit tagy</button>
                    </form>
                    <hr>
                    <div class="modal-text mb-2">Pokud chcete nový tag, musíte ho nejdříve vytvořit na stránce s tagy
                    </div>
                    <a href="{{ route('tags') }}" class="btn btn-dark">Stránka s tagy</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteProjectModal" tabindex="-1" role="dialog" aria-labelledby="deleteProjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="addTaskModalLabel">Odstranit projekt</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-2 modal-text">Přejete si odstranit tento projekt?</div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                            Odstranit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
