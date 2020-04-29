@extends('layouts.backend.master')

@push('CustomJS')
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
	<script src="{{ asset('js/books/index.js') }}" defer></script>
@endpush 

@section('content')
				
    @component('components.breadcrumbs')
        <li class="breadcrumb-item">
            <a href="#">{{ __('Books Management') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('books.index') }}">{{ __('Books') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
	@endcomponent
	
	<div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('books.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增書本
			</a>
		</div>
	</div>

	<div id="book">
		<span id="BooksGetList" class="d-none">{{ route('books.getList') }}</span>

		<span id="cuurent_page" class="d-none">1</span>
		<span id="count_pre_page" class="d-none">20</span>

		<books-table :books="books" :total_page="{{ $total_page }}"></books-table>
		<loading-modal></loading-modal>
	</div>

@endsection
