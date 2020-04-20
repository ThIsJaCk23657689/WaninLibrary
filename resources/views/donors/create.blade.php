@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/donors/create.js') }}" defer></script>
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('donors.index') }}">{{ __('Donors') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Create') }}</li>
    @endcomponent
    
    <div id="donor">
        <span id="DonorsIndexURL" class="d-none">{{ route('donors.index') }}</span>
        <span id="DonorsStoreURL" class="d-none">{{ route('donors.store') }}</span>
        <span id="DonorsListURL" class="d-none">{{ route('donors.getList') }}</span>

        <donor-create-form></donor-create-form>
        <loading-modal></loading-modal>
    </div>

@endsection
