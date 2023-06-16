@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $project->name }}</div>

                <div class="card-body">
                    <p>{{ $project->description }}</p>
                    <div class="my-5">
                        <h5>{{ __('Úkoly') }}</h5>
                        @if ($project->tasks->count() > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-end text-nowrap" style="width: 50px;"></th>
                                    <th>Name</th>
                                    <th>Project</th>
                                    <th>Due Date</th>
                                    <th>Tags</th>
                                    <th class="text-end text-nowrap" style="width: 50px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project->tasks as $task)
                                    <tr class="{{ $task->completed ? 'completed' : '' }}">
                                        <td>
                                            <div class="form-check">
                                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                    
                                                    <input class="form-check-input custom-control-input" type="checkbox" name="completed"
                                                        {{ $task->completed ? 'checked' : '' }} id="task{{ $task->id }}Checkbox"
                                                        onchange="this.form.submit()">
                                                    <label class="form-check-label custom-control-label"
                                                        for="task{{ $task->id }}Checkbox"></label>
                                                </form>
                                            </div>
                    
                    
                                        </td>
                                        <td>{{ $task->name }}</td>
                                        <td>
                                            @if ($task->project != null)
                                                {{ $task->project->name }}
                                            @endif
                                        </td>
                                        <td>{{ $task->due }}</td>
                                        <td></td>
                    
                                        <td class="text-end" style="width: 50px;"">
                                            <div class="dropdown float-end">
                                                <button class="btn btn-sm btn-link dropdown-toggle" type="button"
                                                    id="task{{ $task->id }}Actions" data-bs-toggle="dropdown" aria-expanded="false">
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="task{{ $task->id }}Actions">
                                                    <li><a class="dropdown-item" href="{{ route('tasks.show', $task->id) }}">Zobrazit</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('tasks.edit', $task->id) }}">Upravit</a></li>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li><button type="submit" class="dropdown-item" href="#">Odstranit</a></button>
                                                    </form>
                    
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>{{ __('Žádné úkoly nenalezeny.') }}</p>
                        @endif


                        <a href="#" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#addTaskModal">Přidat
                            úkol</a>
                    </div>
                    <hr>
                    <div>
                        <h5>{{ __('Poznámky') }}</h5>

                        <div class="row">
                            @foreach ($project->notes as $note)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <a class="text-decoration-none custom-link" href="{{ route('notes.edit', $note->id) }}">
                                        <div class="card note rounded p-3 shadow-lg mb-5"
                                            style="height: 250px; width: 250px; background-color: #{{ $note->color }}">
                                            <h5 class="card-title">{{ $note->title }}</h5>
                                            <p class="card-body p-0">{{ $note->body }}
                                            </p>
                                        </div>
                                    </a>

                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('notes.create') }}" class="btn btn-primary float-right">Nová poznámka</a>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('projects.edit', $project->id) }}"
                            class="btn btn-primary">{{ __('Edit') }}</a>

                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                        </form>

                        <a href="{{ route('projects') }}" class="btn btn-secondary">{{ __('Back to Projects') }}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
