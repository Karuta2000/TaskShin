<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card py-5 shadow">
            <div class="form-group row">
                <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                <div class="col-md-6">
                    <input id="avatar" type="text" class="form-control @error('avatar') is-invalid @enderror"
                        name="avatar" wire:model="url" autocomplete="avatar" autofocus>

                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <img src="{{ $url }}" alt="Avatar" class="img-fluid rounded-circle avatar-settings mx-auto shadow-lg my-3">

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button wire:click='saveAvatar' type="button" class="btn btn-primary">
                        Save avatar
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
