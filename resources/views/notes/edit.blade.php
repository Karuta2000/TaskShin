@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">{{ __('Úprava poznámky') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.update', $note->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">{{ __('Název') }}</label>
                                <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title', $note->title) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="body">{{ __('Text') }}</label>
                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" rows="7" name="body">{{ old('body', $note->body) }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach ($colors as $color)
                                    <div class="col-1">
                                        <div id="color{{$color->id}}" style="height: 50px; width: 50px; background-color: #{{ $color->HEX }}; border: 1px black solid; cursor: pointer"
                                            onclick="changeColor('{{ $color->HEX }}')"></div>
                                    </div>
                                    @endforeach
                                    <input id="colorOfProject" type="hidden" name="color" value="{{ $note->color }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="project_id" class="form-label">Projekt</label>
                                <select class="form-control" name="project_id" id="project_id">
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
                            <button type="submit" class="btn btn-primary">{{ __('Uložit') }}</button>
                            <a href="{{ route('projects') }}" class="btn btn-secondary">{{ __('Zrušit') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function changeColor(color){
        inp = document.getElementById("colorOfProject");
        inp.value = color;
    }
</script>
@endsection