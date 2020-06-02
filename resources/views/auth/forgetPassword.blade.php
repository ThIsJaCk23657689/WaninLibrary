@extends('layouts.app')

@push('CustomJS')
    <script src="{{ asset('js/auth/forgetPassword.js') }}" defer></script>
@endpush

@section('content')
<div id="forgetPassword" class="container">
    <span id="forgetPasswordAPIURL" class="d-none">{{ route('api.forgetPassword') }}</span>
    <span id="LoginURL" class="d-none">{{ route('login') }}</span>
    {{-- <span>{{ route('password.request') }}</span> --}}
    <forget-password-form></forget-password-form>
</div>
@endsection
