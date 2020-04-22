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
        <span id="DonorsListURL" class="d-none">{{ route('donors.getList') }}</span>
        <span id="backendURL" class="d-none">{{ route('backend') }}</span>
        <span id="BooksBugURL" class="d-none">{{ route('books.bugurl') }}</span>

        <book-create-form :uploadimg="'{{ asset('images/upload-init.png') }}'"></book-create-form>
        <loading-modal></loading-modal>
    </div>

@endsection
