<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Delete Account') }}</div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-body">{{ __('Permanently delete your account.') }}</div>


                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">

                            <div class="max-w-xl text-sm text-gray-600">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                            </div>

                            <div class="mt-5">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#confirmDeleteModal" wire:loading.attr="disabled">
                                    {{ __('Delete Account') }}
                                </button>
                            </div>

                            <!-- Delete User Confirmation Modal -->
                            <div wire:ignore.self class="modal" id="confirmDeleteModal" tabindex="-1" role="dialog"
                                wire:model="confirmingUserDeletion">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('Delete Account') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close" wire:click="$toggle('confirmingUserDeletion')">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                                            <div class="mt-4" x-data="{}"
                                                x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                                                <input type="password" class="form-control mt-1 w-3/4"
                                                    autocomplete="current-password" placeholder="{{ __('Password') }}"
                                                    x-ref="password" wire:model="password"
                                                    wire:keydown.enter="deleteUser" />
                                                <x-input-error for="password" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                wire:click="$toggle('confirmingUserDeletion')">
                                                {{ __('Cancel') }}
                                            </button>
                                            <button type="button" class="btn btn-danger ms-3" wire:click="deleteUser"
                                                wire:loading.attr="disabled">
                                                {{ __('Delete Account') }}
                                            </button>
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
