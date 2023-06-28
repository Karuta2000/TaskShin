<div>
    <div class="py-2 shadow-sm rounded mb-3 bg-blur">

        <div class="input-group col-2">
            <a href="#" class="btn btn-light text-left border-0"  data-toggle="modal" data-target="#addTagModal" wire:click="clearForm()"
                style="text-align: left !important; background: transparent  !important; color: #00A8E8">
                <i class="fa fa-plus" aria-hidden="true"></i></a>

        </div>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Color</th>
                <th scope="col">Projects</th>
                <th scope="col">Images</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td><span class="badge p-2 text-light shadow-sm"
                            style="background-color: #{{ $tag->color->HEX }}; color:  {{ $tag->color->darkText ? '#000000' : '#FFFFFF' }} !important">...</span>
                    </td>
                    <td>{{ $tag->projects->count() }}</td>
                    <td>{{ $tag->images->count() }}</td>
                    <td class="text-end" style="width: 50px;">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-link dropdown-toggle" type="button"
                                id="task{{ $tag->id }}Actions" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="task{{ $tag->id }}Actions">
                                <li><a class="dropdown-item" href="#" wire:click="editTag({{ $tag->id }})"
                                        data-toggle="modal" data-target="#editTagModal">Edit</a></li>
                                <li><a class="dropdown-item" href="#" wire:click="deleteTag({{ $tag->id }})"
                                    data-toggle="modal" data-target="#deleteTagModal">Delete</a></li>

                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="modal fade" id="editTagModal" tabindex="-1" role="dialog" aria-labelledby="editTagModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="addTagModalLabel">Edit tag</h5>
                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" wire:model="name" required>
                    </div>
                    <div class="form-group container">
                        <div class="square-radio px-3">
                            <div class="row">
                                @foreach ($colors as $color)
                                    <div class="col-2 mb-2">
                                        <input class="form-check-input mx-auto" type="radio" name="color_id"
                                            value="{{ $color->id }}" wire:model="color_id"
                                            {{ $color->id == $color_id ? 'checked' : '' }}
                                            style="background-color: #{{ $color->HEX }}" required>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button type="button" wire:click="updateTag()" class="btn btn-warning" data-dismiss="modal"
                        aria-label="Close">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="addTagModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="addTagModalLabel">Add tag</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" wire:model="name" required>
                    </div>
                    <div class="form-group container">
                        <div class="square-radio px-3">
                            <div class="row">
                                @foreach ($colors as $color)
                                    <div class="col-2 mb-2">
                                        <input class="form-check-input mx-auto" type="radio" name="color_id"
                                            value="{{ $color->id }}" wire:model="color_id"
                                            {{ $color->id == '1' ? 'checked' : '' }}
                                            style="background-color: #{{ $color->HEX }}" required>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button type="button" wire:click="storeTag()" class="btn btn-primary" data-dismiss="modal"
                        aria-label="Close">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteTagModal" tabindex="-1" role="dialog" aria-labelledby="deleteTagModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="deleteTagModalLabel">Delete tag</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you wish to delete this tag?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        aria-label="Close">Cancelt</button>
                    <button wire:click="destroyTag()" type="button" class="btn btn-danger" data-dismiss="modal"
                        aria-label="Close">Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>
