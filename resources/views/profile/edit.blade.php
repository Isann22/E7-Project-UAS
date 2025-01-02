@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-5 text-center text-light">{{ __('Profile') }}</h2>
            <div class="mb-4 edit">
                @include('profile.partials.update-profile-information-form')
            </div>
            <div class="mb-4 edit">
                @include('profile.partials.update-password-form')
            </div>
            <div class="mb-4 edit">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
