@extends('layouts.backend.master')

@push('CustomJS')
	{{-- <script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script> --}}
	{{-- <script src="{{ asset('js/admin/demo/chart-bar-demo.js') }}" defer></script> --}}
	<script src="{{ asset('js/backend/index.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Dashboard') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Index') }}</li>
	@endcomponent

	<div id="backend">
        <span id="" class="d-none"></span>
        <span id="getBookCountByCategoryURL" class="d-none">{{ route('books.getBookCountByCategory') }}</span>

		<div class="row">
			<div class="col-md-12">
				<bar-chart canvas-id="BarChartByCategory"></bar-chart>
			</div>

		</div>

        @include('partials.backend.iconcards')

        <div id="chart_card">
            <span id="BorrowLogsGetListByMonthURL" class="d-none">{{ route('statistics.getBorrowLogsChartByMonth') }}</span>
            <span id="BorrowLogsGetListByYearURL" class="d-none">{{ route('statistics.getBorrowLogsChartByYear') }}</span>

            <chart-card></chart-card>

        </div>

		{{-- @include('partials.backend.examplechart') --}}
	</div>

@endsection
