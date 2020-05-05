@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/users/create.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('users.index') }}">{{ __('Admins') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Create') }}</li>
	@endcomponent

    <div id="user">
        <span id="UsersIndexURL" class="d-none">{{ route('users.index') }}</span>
        <span id="UsersStoreURL" class="d-none">{{ route('users.store') }}</span>

        <user-create-form></user-create-form>
    </div>

@endsection
