<div style="text-align: left !important">
    <div class="p-2 shadow-sm rounded bg-dark mb-3">
        <a href="#" wire:click="clearForm()" data-toggle="modal" data-target="#addNoteModal" class="btn btn-light"><i
                class="fa fa-plus" aria-hidden="true"></i></a>
        <div class="float-right">
            <form action="/search-projects" method="get">
                <input type="text" id="searchInput" class="form-control" wire:model="searchTerm"
                    placeholder="Search...">
            </form>

        </div>
    </div>
    <div class="row">
        @foreach ($notes as $note)
            <div class="col-lg-2 col-md-6 col-sm-12">
                <a class="text-decoration-none custom-link" href="#" wire:click="editNote({{ $note->id }})"
                    data-toggle="modal" data-target="#editNoteModal">
                    <div class="card note rounded shadow mb-5 mx-auto"
                        style="background-color: #{{ $note->color->HEX }}; color: {{ $note->color->darkText ? '#000000' : '#FFFFFF' }}">
                        <div class="card-body p-3">
                            <h5 class="card-title">{{ $note->title }}</h5>
                            <p class="card-body p-0">
                                {{ Illuminate\Support\Str::limit($note->body, 118, '...') }}
                            </p>
                        </div>
                        <div class="card-footer">
                            {{ Illuminate\Support\Str::limit($note->lastUpdate(), 10, '...') }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>



    <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNoteModalLabel"
        aria-hidden="true" wire:ignore>
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
                            <div class="row">
                                @foreach ($colors as $color)
                                    <div class="col-2 mb-2">
                                        <input class="form-check-input mx-auto" type="radio" name="color_id"
                                            wire:model="color_id" value="{{ $color->id }}"
                                            {{ $color->HEX == 'FFFFFF' ? 'checked' : '' }}
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button type="button" wire:click="storeNote()" class="btn btn-primary" data-dismiss="modal"
                        aria-label="Close">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="editNoteModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="editNoteModalLabel">Edit note</h5>
                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
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
                            <div class="row">
                                @foreach ($colors as $color)
                                    <div class="col-2 mb-2">
                                        <input class="form-check-input mx-auto" type="radio" name="color_id"
                                            wire:model="color_id" value="{{ $color->id }}"
                                            {{ $color->HEX == $note->color->HEX ? 'checked' : '' }}
                                            style="background-color: #{{ $color->HEX }}" required wire:ignore>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button type="button" wire:click="updateNote()" class="btn btn-warning" data-dismiss="modal"
                        aria-label="Close">Save</button>
                </div>
            </div>
        </div>
    </div>


</div>
