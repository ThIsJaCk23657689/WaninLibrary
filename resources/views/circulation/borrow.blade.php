@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('js/circulation/borrow.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Circulation') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('circulation') }}">書籍借出</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

    <div id="circulation">
		<span id="BorrowersFilterURL" class="d-none">{{ route('borrowers.filter') }}</span>
		<span id="getBookDataByBarcode" class="d-none">{{ route('books.barcode.json') }}</span>
		<span id="borrowBookURL" class="d-none">{{ route('circulation.borrow') }}</span>

        <borrow-book-form></borrow-book-form>
    </div>

@endsection
