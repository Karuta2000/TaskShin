<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-8 card py-3 shadow">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-group row">
                <label for="banner" class="col-md-4 col-form-label text-md-right">{{ __('Banner') }}</label>
                <div class="col-md-6">
                    <input id="banner" type="text" wire:model="profile.banner"
                        class="form-control @error('profile.banner') is-invalid @enderror" autocomplete="banner"
                        autofocus>
                    @error('profile.banner')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="Male"
                            wire:model="profile.sex">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="Female"
                            wire:model="profile.sex">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="other" value="Other"
                            wire:model="profile.sex">
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                    @error('profile.sex')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="birthday" class="col-md-4 col-form-label text-md-right">Birthday:</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="birthday" wire:model="profile.birthday">
                    @error('profile.birthday')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description:</label>
                <div class="col-md-6">

                    <textarea class="form-control" rows="14" id="description" rows="3" wire:model="profile.description"></textarea>
                    @error('profile.description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="color" class="col-md-4 col-form-label text-md-right">Color:</label>
                <div class="col-md-6">
                    <select class="form-control @error('profile.color_id') is-invalid @enderror" id="color"
                        wire:model="profile.color_id">
                        @php
                            $colors = App\Models\Color::all();
                            
                        @endphp
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}" style="color: {{ $color->darkText ? "#000000" : "#FFFFFF" }}; background-color: #{{ $color->HEX }};">{{ $color->name }}</option>
                        @endforeach
                    </select>
                    @error('profile.color_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="button" wire:click="save()" class="btn btn-primary">
                        {{ __('Save changes') }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
