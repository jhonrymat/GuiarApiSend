<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Browser Sessions') }}</div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-body">
                            {{ __('Manage and log out your active sessions on other browsers and devices.') }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">

                            <div class="max-w-xl text-sm text-gray-600">
                                {{ __('Manage and log out your active sessions on other browsers and devices.') }}
                            </div>

                            @if (count($this->sessions) > 0)
                                <div class="mt-5 space-y-6">
                                    <!-- Other Browser Sessions -->
                                    @foreach ($this->sessions as $session)
                                        <div class="flex items-center">
                                            <div>
                                                @if ($session->agent->isDesktop())
                                                    <i class="bi bi-laptop text-gray-500"></i>
                                                @else
                                                    <i class="bi bi-tablet text-gray-500"></i>
                                                @endif
                                            </div>

                                            <div class="ms-3">
                                                <div class="text-sm text-gray-600">
                                                    {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }}
                                                    -
                                                    {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                                                </div>

                                                <div>
                                                    <div class="text-xs text-gray-500">
                                                        {{ $session->ip_address }},

                                                        @if ($session->is_current_device)
                                                            <span
                                                                class="text-success font-semibold">{{ __('This device') }}</span>
                                                        @else
                                                            {{ __('Last active') }} {{ $session->last_active }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="flex items-center mt-5">
                                <button class="btn btn-primary" wire:click="confirmLogout" wire:loading.attr="disabled">
                                    {{ __('Log Out Other Browser Sessions') }}
                                </button>

                                <x-action-message class="ms-3" on="loggedOut">
                                    {{ __('Done.') }}
                                </x-action-message>
                            </div>

                            <!-- Log Out Other Devices Confirmation Modal -->
                            <div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog"
                                aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmLogoutModalLabel">
                                                {{ __('Log Out Other Browser Sessions') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
                                            <div class="mt-4">
                                                <input type="password" class="form-control" wire:model="password"
                                                    placeholder="{{ __('Password') }}"
                                                    autocomplete="current-password" />
                                                <x-input-error for="password" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                            <button type="button" class="btn btn-primary"
                                                wire:click="logoutOtherBrowserSessions"
                                                wire:loading.attr="disabled">{{ __('Log Out Other Browser Sessions') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('confirmLogoutModal'))
            window.livewire.on('confirmingLogoutOtherBrowserSessions', () => {
                myModal.show()
                setTimeout(() => document.getElementById('password').focus(), 250);
            })
        })
    </script>
@endpush
