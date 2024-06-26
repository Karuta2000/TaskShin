<div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" wire:ignore>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="addTaskModalLabel">New note</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="name" wire:model="title" required>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="date" class="form-control" id="body" name="body" wire:model="body"></textarea>
                </div>
                <div class="form-group">
                    <div class="square-radio px-3">
                        <label for="color_id" class="form-label">Colors</label>
                        <div class="row">
                            @foreach ($colors as $color)
                                <div class="col-1">
                                    <input class="form-check-input" type="radio" name="color_id"
                                        value="{{ $color->id }}" {{ $color->HEX == 'FFFFFF' ? 'checked' : '' }}
                                        style="background-color: #{{ $color->HEX }}" required>
                                </div>
                            @endforeach
                        </div>

                    </div>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="button" wire:click="storeNote()" class="btn btn-primary" data-dismiss="modal"
                    aria-label="Close">Add</button>
            </div>
        </div>
    </div>

    <script>
        const addNoteModal = new bootstrap.Modal(document.getElementById('addNoteModal'), options)
        addNoteModal.show();
    </script>
</div>
