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

		<div class="row">
			<div class="col-md-6">
				<bar-chart canvas-id="BarChartByCategory"></bar-chart>
			</div>
			<div class="col-md-6">
				<bar-chart canvas-id="BarChart"></bar-chart>
			</div>
		</div>
		
		@include('partials.backend.iconcards')
		
		@include('partials.backend.examplechart')
	</div>

@endsection
