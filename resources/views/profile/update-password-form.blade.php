<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Update Password') }}</div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-body">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}</div>

                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form wire:submit.prevent="updatePassword">

                                <!-- Current Password -->
                                <div class="mb-3">
                                    <label for="current_password"
                                        class="form-label">{{ __('Current Password') }}</label>
                                    <input wire:model="state.current_password" id="current_password" type="password"
                                        class="form-control" autocomplete="current-password" />
                                    <x-input-error for="current_password" class="mt-2" />
                                </div>

                                <!-- New Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                                    <input wire:model="state.password" id="password" type="password"
                                        class="form-control" autocomplete="new-password" />
                                    <x-input-error for="password" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation"
                                        class="form-label">{{ __('Confirm Password') }}</label>
                                    <input wire:model="state.password_confirmation" id="password_confirmation"
                                        type="password" class="form-control" autocomplete="new-password" />
                                    <x-input-error for="password_confirmation" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
