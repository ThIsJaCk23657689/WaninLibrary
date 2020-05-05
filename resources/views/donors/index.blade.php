@extends('layouts.backend.master')

@push('CustomJS')
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
	<script src="{{ asset('js/donors/index.js') }}" defer></script>
@endpush 

@section('content')
				
    @component('components.breadcrumbs')
        <li class="breadcrumb-item">
            <a href="#">{{ __('People Management') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('donors.index') }}">{{ __('Donors') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

	<div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('donors.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增捐贈人
			</a>
		</div>
	</div>
	
	<div id="donor">
		<span id="DonorsGetList" class="d-none">{{ route('donors.getList') }}</span>
		<span id="DataTotalCount" class="d-none">{{ $DataTotalCount }}</span>

		<donors-table :donors="donors" :rows-per-page="rowsPerPage" :page-num="pageNum" :total-page="totalPage" v-on:update-donors="updateDonors"></donors-table>
	</div>

@endsection
