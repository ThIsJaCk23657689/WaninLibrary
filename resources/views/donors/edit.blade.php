@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/donors/edit.js') }}" defer></script>
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('donors.index') }}">{{ __('Donors') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Edit') }}</li>
    @endcomponent
    
    <div id="donor">
        <span id="DonorsIndexURL" class="d-none">{{ route('donors.index') }}</span>
        <span id="DonorsGetOneURL" class="d-none">{{ route('donors.getOne', [$donor->id]) }}</span>
        <span id="DonorsUpdateURL" class="d-none">{{ route('donors.update', [$donor->id]) }}</span>

        <donor-update-form></donor-update-form>
        <loading-modal></loading-modal>
    </div>

@endsection
