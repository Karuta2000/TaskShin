<div>
    <div class="p-2 shadow-sm rounded bg-dark mb-3">
        <a href="{{ route('projects.create') }}" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i></a>
        <div class="float-right">
            <div class="input-group">
                <select class="form-select" wire:model="sortBy" aria-label="Seřadit podle">
                    <option value="name" selected>Řadit podle názvu</option>
                    <option value="updated_at">Řadit od poslední změny</option>
                </select>
                <input type="text" id="searchInput" class="form-control" wire:model="searchTerm" style="{{ \Illuminate\Support\Str::startsWith($searchTerm, '#') ? 'background-color: #BBC2E2' : ''}}"
                    placeholder="Search...">

            </div>

        </div>
    </div>
    <div class="row">


        @foreach ($projects as $project)
            @component('components.project-card', ['project' => $project])
            @endcomponent
        @endforeach



    </div>
</div>
