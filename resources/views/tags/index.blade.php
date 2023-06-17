@extends('layout')

@section('content')
    <h1>Tagy</h1>
    <div class="p-2 shadow-lg rounded bg-dark mb-3">
        <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addTagModal">Nový tag</a>
    </div>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tag</th>
                <th scope="col">Barva</th>
                <th scope="col">Projektů</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{$tag->name}}</td>
                <td><span class="badge p-2 text-light shadow-sm" style="background-color: #{{$tag->color}}">...</span></td>
                <td>{{ $tag->projects->count() }}</td>
                <td class="text-end" style="width: 50px;">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-link dropdown-toggle" type="button"
                            id="task{{ $tag->id }}Actions" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="task{{ $tag->id }}Actions">
                            <li><a class="dropdown-item"
                                    href="{{ route('tags.edit', $tag->id) }}">Upravit</a></li>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <li><button type="submit" class="dropdown-item"
                                        href="#">Odstranit</a></button>
                            </form>

                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Přidat nový tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Název</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Barva</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
                        <button type="submit" class="btn btn-primary">Uložit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
