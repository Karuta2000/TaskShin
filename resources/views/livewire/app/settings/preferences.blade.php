<div>

    <div class="form-group row">
        <label for="color" class="col-md-3 col-form-label text-md-right">Color:</label>
        <div class="col-md-7">
            <select class="form-control @error('preferences.color_id') is-invalid @enderror" id="color"
                wire:model="preferences.color_id">
                @php
                    $colors = App\Models\Color::all();
                @endphp
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}"
                        style="color: {{ $color->darkText ? '#000000' : '#FFFFFF' }}; background-color: #{{ $color->HEX }}">
                        {{ $color->name }}</option>
                @endforeach
            </select>
            @error('preferences.color_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="priority" class="col-md-3 col-form-label text-md-right">Priority:</label>
        <div class="col-md-7">
            <select class="form-control @error('preferences.priority') is-invalid @enderror" id="priority"
                wire:model="preferences.priority">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            @error('preferences.priority')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="defaultProject" class="col-md-3 col-form-label text-md-right">Default Project:</label>
        <div class="col-md-7">
            <select class="form-control @error('preferences.project_id') is-invalid @enderror" id="defaultProject"
                wire:model="preferences.project_id">
                @php
                    $projects = App\Models\Project::where('user_id', auth()->user()->id)->get();
                @endphp
                <option value="">No project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">
                        {{ $project->name }}</option>
                @endforeach
            </select>
            @error('preferences.project_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">Set due date:</label>
        <div class="col-md-7">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="autoDate" id="autoDate" value="1"
                    wire:model="preferences.setDate">
                <label class="form-check-label" for="autoDate">Set Automatically</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="autoDate" id="manualDate" value="0"
                    wire:model="preferences.setDate">
                <label class="form-check-label" for="manualDate">Set Manually</label>
            </div>
        </div>
    </div>



    <div class="form-group row mb-0">
        <div class="col-md-7 offset-md-3">
            <button type="button" wire:click="save()" class="btn btn-primary">
                {{ __('Save changes') }}
            </button>
        </div>
    </div>

</div>
