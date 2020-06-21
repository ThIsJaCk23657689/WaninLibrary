@extends('layouts.backend.master')

@push('CustomJS')
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
        <span id="DonorsListURL" class="d-none">{{ route('donors.getList') }}</span>
        <span id="DonorsGetInfoURL" class="d-none">{{ route('donors.getInfo') }}</span>
        <span id="DonorsNameURL" class="d-none">{{ route('donors.getDonorsByName') }}</span>
        <span id="BooksCoverImageURL" class="d-none">{{ asset($book->showCoverImage()) }}</span>
        <book-update-form
            :book='book'
            :add-type='addType'
            :status-options="status_options"
            :is-modify-status="isOKModifyStatus"
            @update-add-type="updateAddType"
        ></book-update-form>
    </div>

@endsection
