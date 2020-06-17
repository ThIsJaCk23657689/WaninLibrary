@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/information/donate.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Basic:') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('information.index') }}">{{ __('Information') }}</a>
		</li>
		<li class="breadcrumb-item active">好書捐贈</li>
    @endcomponent

    <div id="information">
        <span id="InformationIndexURL" class="d-none">{{ route('information.index') }}</span>
        <span id="InformationUpdateURL" class="d-none">{{ route('information.donateImage') }}</span>
        <span id="InformationGetFirstURL" class="d-none">{{ route('information.getFirst') }}</span>
        <span id="InformationDonateImageURL" class="d-none">{{ asset($information->donate_image) }}</span>

        <information-donate-form :information="information"></information-donate-form>
    </div>

@endsection
