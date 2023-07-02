<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card py-5 shadow">
            <div class="form-group row">


                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" wire:model='user.email'
                        disabled>
                </div>
            </div>


            <div class="form-group row">


                <label for="name" class="col-md-4 col-form-label text-md-right">Nickname</label>

                <div class="col-md-6">
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
                <label for="password" class="col-md-4 col-form-label text-md-right">Yout password</label>

                <div class="col-md-6">
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
                <div class="col-md-6 offset-md-4">
                    <button type="button" wire:click="saveChanges()" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
