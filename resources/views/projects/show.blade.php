@extends('layout')

@section('content')

    <div class="card" style=" background-color: #{{ $project->color }}88">
        <div class="card-header">
            <h2 class="w-50">
                {{ $project->name }}
            </h2>

        </div>

        <div class="card-body">
            <div class="bg-dark rounded p-2">
                <div>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>

                    <a href="{{ route('projects') }}" class="btn btn-secondary">{{ __('Back to Projects') }}</a>
                </div>
            </div>
            <div class="pb-3">
                <a class="btn badge rounded-pill bg-primary p-2 text-light shadow-sm">Primary</a>
                <a class="btn badge rounded-pill bg-primary p-2 text-light shadow-sm" data-toggle="modal"
                    data-target="#addTagModal">+</a>
            </div>

            <div class="card p-3 mb-3 shadow rounded">
                {{ $project->description }}
            </div>

            <div class="row">
                <div class="col">
                    <h3>Úkoly</h3>
                </div>

            </div>
            <div class="p-2 shadow-lg rounded bg-dark">
                <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addTaskModal">Přidat
                    úkol</a>
            </div>


            @if ($project->activeTasks->count() > 0)
                <div class="my-5">
                    <div class="card">

                        <table class="table table-striped mb-0">
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
                                @foreach ($project->activeTasks as $task)
                                    <tr class="{{ $task->completed ? 'completed' : '' }}">
                                        <td>
                                            <div class="form-check">
                                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input class="form-check-input custom-control-input" type="checkbox"
                                                        name="completed" {{ $task->completed ? 'checked' : '' }}
                                                        id="task{{ $task->id }}Checkbox" onchange="this.form.submit()">
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
                                                    id="task{{ $task->id }}Actions" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="task{{ $task->id }}Actions">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('tasks.show', $task->id) }}">Zobrazit</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('tasks.edit', $task->id) }}">Upravit</a>
                                                    </li>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li><button type="submit" class="dropdown-item"
                                                                href="#">Odstranit</a></button>
                                                    </form>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
            @endif

            @if ($project->closedTasks->count() > 0)
                <div class="my-5">
                    <div class="card">

                        <table class="table table-striped mb-0">
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
                                @foreach ($project->closedTasks as $task)
                                    <tr class="{{ $task->completed ? 'completed' : '' }}">
                                        <td>
                                            <div class="form-check">
                                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input class="form-check-input custom-control-input" type="checkbox"
                                                        name="completed" {{ $task->completed ? 'checked' : '' }}
                                                        id="task{{ $task->id }}Checkbox" onchange="this.form.submit()">
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
                                                    id="task{{ $task->id }}Actions" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="task{{ $task->id }}Actions">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('tasks.show', $task->id) }}">Zobrazit</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('tasks.edit', $task->id) }}">Upravit</a>
                                                    </li>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li><button type="submit" class="dropdown-item"
                                                                href="#">Odstranit</a></button>
                                                    </form>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
            @endif




        </div>
        <div class="card bg-note-selection rounded">
            <div class="card-header">
                <h3>{{ __('Poznámky') }} ({{ $project->notes->count() }})</h3>
            </div>

            <div class="card-body">
                <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">Nová poznámka</a>
                <div class="row">
                    @foreach ($project->notes as $note)
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <a class="text-decoration-none custom-link" href="{{ route('notes.edit', $note->id) }}">
                                <div class="card note rounded shadow-lg mb-3 mx-auto"
                                    style="height: 250px; width: 250px; background-color: #{{ $note->color }}">
                                    <div class="card-body p-3">
                                        <h5 class="card-title">{{ $note->title }}</h5>
                                        <p class="card-body p-0">
                                            {{ Illuminate\Support\Str::limit($note->body, 118, '...') }}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        {{ $note->lastUpdate() }} | {{ $note->project->name }}

                                    </div>

                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>
            </div>



        </div>



    </div>

    <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Přidat nový úkol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Název</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Datum</label>
                            <input type="date" class="form-control" id="due" name="due">
                        </div>
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="form-group">
                            <label for="description">Popis</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
                        <button type="submit" class="btn btn-primary">Uložit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="addTagModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Přidat nový tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Název</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Datum</label>
                            <input type="date" class="form-control" id="due" name="due">
                        </div>
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="form-group">
                            <label for="description">Popis</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
                        <button type="submit" class="btn btn-primary">Uložit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
