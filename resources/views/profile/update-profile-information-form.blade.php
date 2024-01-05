<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile Information') }}</div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-body">{{ __('Update your account\'s profile information and email address.') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <form wire:submit.prevent="updateProfileInformation">

                                <!-- Profile Photo -->
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <div class="mb-3">
                                        <label for="photo" class="form-label">{{ __('Photo') }}</label>

                                        <!-- Current Profile Photo -->
                                        <div class="mb-2">
                                            @if ($this->user->profile_photo_path)
                                                <img src="{{ $this->user->profile_photo_url }}"
                                                    alt="{{ $this->user->name }}" class="rounded-circle" width="100">
                                            @else
                                                <div class="text-muted">{{ __('No photo uploaded.') }}</div>
                                            @endif
                                        </div>

                                        <!-- New Profile Photo Input -->
                                        <input wire:model="photo" type="file" id="photo" class="form-control">

                                        @if ($this->user->profile_photo_path)
                                            <small
                                                class="text-muted">{{ __('Upload a new photo to replace the current one.') }}</small>
                                            <button wire:click.prevent="deleteProfilePhoto"
                                                class="btn btn-sm btn-secondary mt-2">{{ __('Remove Photo') }}</button>
                                        @endif

                                        <x-input-error for="photo" class="mt-2" />
                                    </div>
                                @endif

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input wire:model="state.name" id="name" type="text" class="form-control"
                                        required autocomplete="name" />
                                    <x-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input wire:model="state.email" id="email" type="email" class="form-control"
                                        required autocomplete="username" />
                                    <x-input-error for="email" class="mt-2" />

                                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                                            !$this->user->hasVerifiedEmail())
                                        <p class="text-muted mt-2">
                                            {{ __('Your email address is unverified.') }}
                                            <a href="#"
                                                wire:click.prevent="sendEmailVerification">{{ __('Click here to re-send the verification email.') }}</a>
                                        </p>

                                        @if ($this->verificationLinkSent)
                                            <p class="mt-2 text-success">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                                        wire:target="photo">{{ __('Save') }}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
