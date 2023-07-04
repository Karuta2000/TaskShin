<div>
    <div class="form-group row">


        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>

        <div class="col-md-7">
            <input id="email" type="text" class="form-control" wire:model='user.email' disabled>
        </div>
    </div>


    <div class="form-group row">


        <label for="name" class="col-md-3 col-form-label text-md-right">Nickname</label>

        <div class="col-md-7">
            <input id="name" type="text" class="form-control @error('user.name') is-invalid @enderror"
                wire:model='user.name' autofocus>

            @error('user.name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-3 col-form-label text-md-right">Yout password</label>

        <div class="col-md-7">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                wire:model='password' autocomplete="password">
        </div>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-7 offset-md-3">
            <button type="button" wire:click="saveChanges()" class="btn btn-primary">
                Save changes
            </button>
        </div>
    </div>
</div>
