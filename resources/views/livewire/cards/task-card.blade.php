<div class="board-item shadow">
    <div class="task-card shadow round-4 bg-blur-task bg-gradient" style="background-color: #{{ $task->color->HEX }}99; color: {{ $task->color->darkText ? '#000000' : '#FFFFFF' }}">
        <div class="task-card-panel"></div>
        <div>
            <div class="float-end">
                <div>
                    <span class="badge text-bg-primary">{{ $task->priority }}</span>

                    <div class="dropdown text-center" wire:ignore>
                        <button class="btn btn-sm btn-link p-0 pt-1" type="button" id="task{{ $task->id }}Actions"
                            data-bs-toggle="dropdown" aria-expanded="false" wire:ignore><i class="fa fa-cog"
                                aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="task{{ $task->id }}Actions" wire:ignore>
                            <li><a class="dropdown-item" wire:click="$emit('openEditTaskModal', '{{ $task->id }}')" href="#">Update</a>
                            </li>
                            <li><a class="dropdown-item" wire:click="delete()" href="#">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="task-header">
                @if ($editingTitle)
                    <input type="text" name="" id="" class="form-control p-0 h-auto b-0 bg-transparent" wire:model="title" wire:change="saveTitle">
                @else
                    <h5 class="task-title" wire:click="editTitle">{{ Illuminate\Support\Str::limit($task->name, 60, '...') }}</h5>
                @endif


            </div>

            <div class="task-details my-2">
                <div class="due-date">
                    {{ $task->getDueDate() }}
                </div>
                {{ $task->description }} <br>
                @if ($task->project != null)
                    <a href="{{ route('projects.show', $task->project->id) }}">
                        <span class="badge rounded-pill project-pill"
                            style="background-color: #{{ $task->project->color->HEX }}; color: {{ $task->project->color->darkText ? '#000000' : '#FFFFFF' }}">
                            {{ $task->project != null ? $task->project->name : '' }}</span>
                    </a>
                @else
                    <span class="badge rounded-pill bg-dark text-light ">no project</span>
                @endif

            </div>


            <div class="row">
                <div class="col-6">

                    <div class="avatar m-0 mt-1">
                        <a href="{{ route('profile') }}">
                            <img src="{{ $task->user->avatar }}" alt="Avatar"
                                onerror="this.src='{{ asset('images/avatar.png') }}'">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="float-end">
                        <div class="input-group">
                            <div class="form-check">
                                <input type="checkbox" class="custom-control-input" wire:model="completed"
                                    id="task{{ $task->id }}Checkbox" wire:click="complete()">
                                <label class="custom-control-label rounded task-checkbox"
                                    for="task{{ $task->id }}Checkbox"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
