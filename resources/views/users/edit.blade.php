@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/users/edit.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('users.index') }}">{{ __('Admins') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Edit') }}</li>
    @endcomponent

    <div id="user">
        <span id="UsersIndexURL" class="d-none">{{ route('users.index') }}</span>
        <span id="UsersGetOneURL" class="d-none">{{ route('users.getOne', [$user->id]) }}</span>
        <span id="UsersUpdateURL" class="d-none">{{ route('users.update', [$user->id]) }}</span>

        <user-update-form></user-update-form>
        <loading-modal></loading-modal>
    </div>

@endsection
