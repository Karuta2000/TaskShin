<div>

    <div class="p-2 shadow-sm rounded mb-3 bg-blur">
        <a href="{{ route('projects.create') }}" class="btn"><i class="fa fa-plus" aria-hidden="true"
                style="background: transparent  !important; color: #00A8E8;"></i></a>
        <div class="float-right">
            <div class="input-group">
                <select class="form-select" wire:model="sortBy" aria-label="Sort by">
                    <option value="name" selected>Sort by name</option>
                    <option value="updated_at">Sort by last update</option>
                </select>
                <input type="text" id="searchInput" class="form-control" wire:model="searchTerm"
                    style="{{ \Illuminate\Support\Str::startsWith($searchTerm, '#') ? 'background-color: #BBC2E2' : '' }}"
                    placeholder="Search...">

            </div>

        </div>
    </div>


    <div class="projects-board">
        @foreach ($projects as $project)
            @livewire('cards.project', ['project' => $project])
        @endforeach
    </div>



</div>
