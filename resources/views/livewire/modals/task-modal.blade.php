<div>
    <div wire:ignore.self class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModalLabel">Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" wire:model="title">
                    </div>
                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" class="form-control" id="due_date" wire:model="due_date">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select class="form-control" id="priority" wire:model="priority">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="colors">Colors</label>
                        <select class="form-control" id="colors" wire:model="color">
                            @foreach ($allColors as $oneColor)
                                <option value="{{ $oneColor->id }}" style="color: {{ $oneColor->HEX }}">
                                    {{ $oneColor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="projects">Projects</label>
                        <select class="form-control" id="projects" wire:model="project">
                            <option value="">No project</option>
                            @foreach ($yourProjects as $oneProject)
                                <option value="{{ $oneProject->id }}">{{ $oneProject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        wire:click="taskSave">Save</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('openTaskModal', function() {
                $('#taskModal').modal('show');
            });

            Livewire.on('closeTaskModal', function() {
                $('#taskModal').modal('hide');
            });
        });
    </script>

</div>
