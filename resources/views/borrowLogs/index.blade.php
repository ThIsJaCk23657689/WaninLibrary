@extends('layouts.backend.master')

@push('CustomJS')
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
	<script src="{{ asset('js/borrowLogs/index.js') }}" defer></script>
@endpush

@section('content')

    @component('components.breadcrumbs')
        <li class="breadcrumb-item">
            <a href="#">{{ __('Log File') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('books.index') }}">借還書</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
	@endcomponent

	<div id="borrowLog">
		<span id="BorrowLogsGetList" class="d-none">{{ route('borrowLogs.getList') }}</span>
		<span id="DataTotalCount" class="d-none">{{ $DataTotalCount }}</span>

		<borrow-logs-table :borrow-logs="borrowLogs" :rows-per-page="rowsPerPage" :page-num="pageNum" :total-page="totalPage" v-on:update-borrow-log="updateBorrowLog"></borrow-logs-table>
	</div>

@endsection
