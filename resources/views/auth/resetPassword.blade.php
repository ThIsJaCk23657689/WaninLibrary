@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/auth/resetPassword.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="{{ route('backend') }}">{{ __('Backend') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Change Password') }}</li>
    @endcomponent

    <div id="user">
        <span id="IndexURL" class="d-none">{{ route('backend') }}</span>
        <span id="ResetPasswordURL" class="d-none">{{ route('auth.resetPassword') }}</span>

        <reset-password-form></reset-password-form>
    </div>

@endsection
