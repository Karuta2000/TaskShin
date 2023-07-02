<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card py-5 shadow">
            <form wire:submit.prevent="saveChanges">
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Old password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" wire:model="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ __('New password') }}</label>
                    <div class="col-md-6">
                        <input id="new-password" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" autocomplete="new-password" wire:model="newPassword">
                        @error('newPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('New password again') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="newPasswordConfirmation" autocomplete="new-password" wire:model="newPassword_confirmation">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
