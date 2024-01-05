@extends('adminlte::page')

@section('title', __('Profile'))

@section('content_header')
    <h1>{{ __('Profile') }}</h1>
@stop

@section('content')
    <div class="container py-10">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')
                @endif
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-password-form')
                @endif
                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="row mt-3">
                        @livewire('profile.two-factor-authentication-form')
                    </div>
                @endif
                @livewire('profile.logout-other-browser-sessions-form')
                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <div class="row mt-3">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
