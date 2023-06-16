@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">{{ __('Nový projekt') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('Název') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Popis') }}</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>

                                @error('description')
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
                                    <input id="colorOfProject" type="hidden" name="color" value="{{ $color->HEX }}">
                                </div>
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
    function changeColor(color, ){
        inp = document.getElementById("colorOfProject");
        inp.value = color;
    }
</script>
@endsection