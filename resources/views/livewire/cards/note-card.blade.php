<div class="board-item shadow">
    <div class="card note-card note border-0 rounded shadow mb-5 mx-auto bg-gradient"
        style="background-color: #{{ $color->HEX }}; color: {{ $color->darkText ? '#000000' : '#FFFFFF' }}">
        <div class="card-body p-3" wire:click="edit()">
            @if ($edit)
                <div>
                    <input type="text" wire:model="title" wire:keydown.enter="save()" 
                        style="border: none; background: transparent; width: 100%; color: {{ $color->darkText ? '#000000' : '#FFFFFF' }}">
                    <textarea wire:keydown.enter="save()" maxlength="200"
                        style="border: none; background: transparent; width: 100%; height:  200px ; color: {{ $color->darkText ? '#000000' : '#FFFFFF' }}"
                        wire:model="body"></textarea>
                </div>
            @else
                <h5 class="card-title">{{ $note->title }}</h5>

                <p class="card-body p-0">
                    {{ Illuminate\Support\Str::limit($note->body, 200, '...') }}
                </p>
            @endif
        </div>


        <div class="card-footer row">
            <div class="col-6">
                {{ Illuminate\Support\Str::limit($note->lastUpdate(), 10, '...') }}
            </div>
            <div class="col-6 text-end">

                <div class="dropstart">
                    <button class="btn btn-sm btn-link" type="button"
                        style=" color: {{ $color->darkText ? '#000000' : '#FFFFFF' }}"
                        id="note{{ $note->id }}Actions" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </button>

                    <div class="dropdown-menu mb-2" aria-labelledby="note{{ $note->id }}Actions" wire:ignore style="max-height: 200px; overflow-y: auto; overflow-x: hidden">
                        <a class="dropdown-item" wire:click="delete()" href="#"><i class="fa fa-trash"
                                aria-hidden="true"></i> Delete</a>
                        <a class="dropdown-item" wire:click="copy()" href="#"><i class="fa fa-copy"
                                aria-hidden="true"></i> Copy</a>
                        <div class="dropdown-divider"></div>
                        <div>
                            <select class="form-select rounded-0 border-0" wire:model="project_id"
                                wire:change="setProject()">
                                <option value="">No project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($colors != null)

                            <div class="px-2 m">
                                <div class="form-group">
                                    <div class="square-radio">
                                        <div class="row">
                                            @foreach ($colors as $color)
                                                <div class="col-3 mb-1">
                                                    <input class="color-checkbox mx-auto" type="radio"
                                                        wire:click="setColor({{ $color->id }})"
                                                        {{ $color->id == $note->color_id ? 'checked' : '' }}
                                                        style="background-color: #{{ $color->HEX }}" required>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
