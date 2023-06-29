<div style="text-align: left !important">
    <div class="p-2 shadow-sm rounded mb-3 bg-blur">
        <a href="#" class="btn text-left" style="text-align: left !important" wire:click="$emit('openNewTaskModal')">
            <i class="fa fa-plus" aria-hidden="true"
                style="background: transparent  !important; color: #00A8E8;"></i></a>
        <div class="float-right">
            <div class="input-group">
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

    @livewire('modals.task-modal')

</div>
