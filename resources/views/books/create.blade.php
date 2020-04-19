@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/books/create.js') }}" defer></script>
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('books.index') }}">{{ __('Books') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Create') }}</li>
    @endcomponent
    
    <div id="book">
        <span id="BooksIndexURL" class="d-none">{{ route('books.index') }}</span>
        <span id="BooksStoreURL" class="d-none">{{ route('books.store') }}</span>
        <span id="BooksListURL" class="d-none">{{ route('books.getList') }}</span>

        <book-create-form></book-create-form>
        <loading-modal></loading-modal>
    </div>

@endsection
