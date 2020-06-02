@extends('layouts.app')

@push('CustomJS')
    <script src="{{ asset('js/auth/login.js') }}" defer></script>
@endpush

@section('content')
<div id="auth" class="container">
    <span id="LoginAPI" class="d-none">{{ route('api.login') }}</span>
    <span id="IntendedURL" class="d-none">{{ session('url.intended') }}</span>
    <span id="forgetPasswordURL" class="d-none">{{ route('forgetPassword') }}</span>
    {{-- <span>{{ route('password.request') }}</span> --}}
    <login-form></login-form>
</div>
@endsection
