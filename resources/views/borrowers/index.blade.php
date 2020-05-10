@extends('layouts.backend.master')

@push('CustomJS')
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
	<script src="{{ asset('js/borrowers/index.js') }}" defer></script>
@endpush 

@section('content')
				
    @component('components.breadcrumbs')
        <li class="breadcrumb-item">
            <a href="#">{{ __('People Management') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('borrowers.index') }}">{{ __('Borrowers') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

	<div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('borrowers.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增借閱人
			</a>
		</div>
	</div>
	
	<div id="borrower">
		<span id="BorrowersGetList" class="d-none">{{ route('borrowers.getList') }}</span>

		<borrowers-table :borrowers="borrowers" :rows-per-page="rowsPerPage" :page-num="pageNum" :total-page="totalPage" v-on:update-borrowers="updateBorrowers"></borrowers-table>
	</div>
	
@endsection
