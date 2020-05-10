@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/circulation/index.js') }}" defer></script>
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Circulation') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('circulation') }}">借書與還書</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent
    
    <div id="circulation">
        <span id="CirculationIndexURL" class="d-none">{{ route('circulation') }}</span>
        <span id="GetBooksDataByBarcodeURL" class="d-none">{{ route('books.barcode.json') }}</span>

        
        <span id="BooksStoreURL" class="d-none">{{ route('books.store') }}</span>
        <span id="DonorsListURL" class="d-none">{{ route('donors.getList') }}</span>
        <span id="backendURL" class="d-none">{{ route('backend') }}</span>
        <span id="BooksBugURL" class="d-none">{{ route('books.bugurl') }}</span>

        <book-circulation-form></book-circulation-form>
    </div>

@endsection
