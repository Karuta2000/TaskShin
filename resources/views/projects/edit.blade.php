@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        <h2 class="mb-0">{{ __('Upravit projekt') }}</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.update', $project->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">{{ __('Title') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $project->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('Image') }}</label>
                                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $project->image) }}" required>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Popis') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="square-radio px-3">
                                    <div class="row">
                                        @foreach ($colors as $color)
                                            <div class="col-2 mb-2">
                                                <input class="form-check-input mx-auto" type="radio" name="color_id"
                                                    value="{{ $color->id }}" {{ $project->color->id == $color->id ? 'checked' : '' }}
                                                    style="background-color: #{{ $color->HEX }}" required>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                            <input type="hidden" id="user_id" name="user_id" value="{{ $project->user_id }}">

                        </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Upravit projekt') }}</button>
                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary">{{ __('Zrušit') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
