<div style="text-align: left !important">
    <div class="p-2 shadow-sm rounded mb-3 bg-blur">
        <a href="#" class="btn text-left" style="text-align: left !important" data-toggle="modal"
            data-target="#addTaskModal" wire:click="createTask()"><i class="fa fa-plus" aria-hidden="true"
                style="background: transparent  !important; color: #00A8E8;"></i></a>

        <div class="float-right">
            <div class="input-group">
                <input type="checkbox" class="btn-check rounded" id="btn-check-outlined-notify" autocomplete="off"
                    wire:model="deleteNotify" style="display: none">
                <label class="btn btn-outline-light px-3 mb-0" for="btn-check-outlined-notify"><i
                        class="fa fa-exclamation" aria-hidden="true"></i></label><br>
                <input type="checkbox" class="btn-check rounded" id="btn-check-outlined-tasks" autocomplete="off"
                    wire:model="closedTasks" style="display: none">
                <label class="btn btn-outline-light mb-0" for="btn-check-outlined-tasks"><i class="fa fa-check"
                        aria-hidden="true"></i></label><br>
                <select class="form-select" wire:model="sortBy" aria-label="Sort by">
                    <option value="name" selected>Sort by name</option>
                    <option value="priority" selected>Sort by priority</option>
                    <option value="due" selected>Sort by due date</option>
                    <option value="updated_at">Sort by last update</option>
                </select>
                <input type="text" id="searchInput" class="form-control" wire:model="searchTerm"
                    style="{{ \Illuminate\Support\Str::startsWith($searchTerm, '#') ? 'background-color: #BBC2E2' : '' }}"
                    placeholder="Search...">


            </div>

        </div>
    </div>

    <div class="row mb-5">

        <div class="task-board">
            @foreach ($tasks as $task)
                @livewire('cards.task-card', ['task' => $task], key($task->id))
            @endforeach
        </div>





    </div>

















    <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="addTaskModalLabel">New task</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="name" name="name" wire:model="name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="name">Due</label>
                        <input type="date" class="form-control" id="due" name="due" wire:model="due">
                    </div>
                    <div class="form-group">
                        <label for="project_id" class="form-label">Project</label>
                        <select class="form-control" name="project_id" id="project_id" wire:model="project_id">
                            <option value="">No project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" wire:model="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="priority"></label>
                        <select name="priority" id="priority" wire:model="priority">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button type="button" wire:click="storeTask()" class="btn btn-primary" data-dismiss="modal"
                        aria-label="Close">Add</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="editTaskModalLabel">Upravit úkol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Název</label>
                        <input type="text" class="form-control" id="name" name="name" wire:model="name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="name">Datum</label>
                        <input type="date" class="form-control" id="due" name="due" wire:model="due">
                    </div>
                    <div class="form-group">
                        <label for="project_id" class="form-label">Projekt</label>
                        <select class="form-control" name="project_id" id="project_id" wire:model="project_id">
                            <option value="">Bez projektu</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" wire:model="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select class="form-control" name="priority" id="priority" wire:model="priority">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        aria-label="Close">Zrušit</button>
                    <button type="button" class="btn btn-warning" wire:click="updateTask()" data-dismiss="modal"
                        aria-label="Close">Uložit</button>
                </div>
            </div>
        </div>
    </div>


    @if ($deleteNotify)
        <div class="modal fade" id="deleteTaskModal" tabindex="-1" role="dialog"
            aria-labelledby="deleteTaskModalLabel" aria-hidden="true" wire:ignore>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-light">
                        <h5 class="modal-title" id="editTaskModalLabel">Odstranit úkol</h5>
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Přejete si odstranit tento úkol?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            aria-label="Close">Zrušit</button>
                        <button wire:click="destroyTask()" type="button" class="btn btn-danger"
                            data-dismiss="modal" aria-label="Close">Smazat</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


</div>
