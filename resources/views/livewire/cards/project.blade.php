<div class="col-lg-3 col-md-6 col-sm-12 mb-3">
    <div class="card shadow-lg border-0 rounded-3" style="background-color: #{{ $project->color->HEX }}AA">
        <div class="card-img-top banner-image">
            <img src="{{ $project->image }}" onerror="this.src='{{ asset('images/homepagewallpaper.jpg') }}'"
                class="img-fluid" alt="Project Image">
        </div>
        <div class="card-body px-3 fw-medium">
            <h4 class="m-3 text-center" style="color: {{ $project->color->darkText ? '#000000' : '#FFFFFF' }}">
                {{ Illuminate\Support\Str::limit($project->name, 26, '...') }}</h4>
            @isset($project->description)
                <p class="card-text bg-light shadow-sm rounded p-1 me-1 w-auto">
                    {{ Illuminate\Support\Str::limit($project->description, 26, '...') }}</p>
            @else
                <p class="card-text bg-light shadow-sm rounded p-1 me-1 w-auto">Bez popisku</p>
            @endisset

            <div class="row px-2">
                <div class="bg-light shadow-sm rounded p-1 me-1 w-auto">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    @if ($project->tasks->count() > 0)
                        {{ $project->tasks->where('completed', 1)->count() }}/{{ $project->tasks->count() }}
                        ({{ ($project->tasks->where('completed', 1)->count() / $project->tasks->count()) * 100 }}%)
                    @else
                        0
                    @endif
                </div>
                <div class="bg-light shadow-sm rounded p-1 me-1 w-auto">
                    <i class="fa fa-sticky-note" aria-hidden="true"></i> {{ $project->notes->count() }}

                </div>
                <div class="bg-light shadow-sm rounded p-1 me-1 w-auto">
                    <i class="fa fa-tags" aria-hidden="true"></i> {{ $project->tags->count() }}
                </div>


            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary"><i class="fa fa-eye"
                    aria-hidden="true"></i></a>
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning"><i class="fa fa-pencil"
                    aria-hidden="true"></i></a>
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-dark"><i class="fa fa-star-o"
                    aria-hidden="true"></i></a>
        </div>


    </div>
</div>
