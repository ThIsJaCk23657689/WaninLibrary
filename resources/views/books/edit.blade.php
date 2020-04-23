@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/books/edit.js') }}" defer></script>
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Books Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('books.index') }}">{{ __('Books') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Edit') }}</li>
    @endcomponent
    
    <div id="book">
        <span id="BooksIndexURL" class="d-none">{{ route('books.index') }}</span>
        <span id="BooksGetOneURL" class="d-none">{{ route('books.getOne', [$book->id]) }}</span>
        <span id="BooksUpdateURL" class="d-none">{{ route('books.update', [$book->id]) }}</span>

        <book-update-form></book-update-form>
        <loading-modal></loading-modal>
    </div>

@endsection
