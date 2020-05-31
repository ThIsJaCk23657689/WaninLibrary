@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('js/chart/index.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Statistics') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('statistic.chart.index') }}">{{ __('Chart') }}</a>
		</li>
    @endcomponent
    <div id="chart_card">
        <span id="BorrowLogsGetListByMonthURL" class="d-none">{{ route('statistics.getBorrowLogsChartByMonth') }}</span>
        <span id="BorrowLogsGetListByYearURL" class="d-none">{{ route('statistics.getBorrowLogsChartByYear') }}</span>

        <chart-card></chart-card>

    </div>


@endsection
