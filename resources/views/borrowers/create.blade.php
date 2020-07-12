@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/borrowers/create.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('borrowers.index') }}">{{ __('Borrowers') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Create') }}</li>
    @endcomponent

    <div id="borrower">
        <span id="BorrowersIndexURL" class="d-none">{{ route('borrowers.index') }}</span>
        <span id="BorrowersStoreURL" class="d-none">{{ route('borrowers.store') }}</span>
        <span id="AgenciesListURL" class="d-none">{{ route('agencies.getList') }}</span>
        <span id="AgenciesStoreURL" class="d-none">{{ route('agencies.store') }}</span>
        <span id="NameIsIniqueURL" class="d-none">{{ route('borrowers.nameIsInique') }}</span>

        <borrower-create-form></borrower-create-form>
    </div>

@endsection
