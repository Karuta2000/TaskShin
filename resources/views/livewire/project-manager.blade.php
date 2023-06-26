<div>
    <div class="p-2 shadow-sm rounded bg-dark mb-3">
        <a href="{{ route('projects.create') }}" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i></a>
        <div class="float-right">
            <div class="input-group">
                <select class="form-select" wire:model="sortBy" aria-label="Sort by">
                    <option value="name" selected>Sort by name</option>
                    <option value="updated_at">Sort by last update</option>
                </select>
                <input type="text" id="searchInput" class="form-control" wire:model="searchTerm" style="{{ \Illuminate\Support\Str::startsWith($searchTerm, '#') ? 'background-color: #BBC2E2' : ''}}"
                    placeholder="Search...">

            </div>

        </div>
    </div>
    <div class="row">


        @foreach ($projects as $project)
            @livewire('cards.project', ['project' => $project])
        @endforeach
        


    </div>
</div>
