@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
    <script src="{{ asset('js/loginLogs/index.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Log File') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('loginLogs.index') }}">{{ __('Login') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

    <div id="loginlog">
		<span id="LoginLogsGetList" class="d-none">{{ route('loginLogs.getList') }}</span>
		<span id="getLoginLogsByDate" class="d-none">{{ route('loginLogs.getLoginLogsByDate') }}</span>
		<span id="getLoginLogsByMonth" class="d-none">{{ route('loginLogs.getLoginLogsByMonth') }}</span>
        <span id="getLoginLogsByYear" class="d-none">{{ route('loginLogs.getLoginLogsByYear') }}</span>
        <span id="getLoginLogsByTimeRange" class="d-none">{{ route('loginLogs.getLoginLogsByTimeRange') }}</span>

        <table-filter v-on:refresh-table="refreshTable"></table-filter>
		<login-log-table :loginlogs="loginlogs" :loginlogsjson="loginlogsjson"></login-log-table>
		<loading-modal></loading-modal>
	</div>
@endsection
