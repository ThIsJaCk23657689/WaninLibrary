@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/information/edit.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Basic:') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('information.index') }}">{{ __('Information') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Edit') }}</li>
    @endcomponent

    <div id="information">
        <span id="InformationIndexURL" class="d-none">{{ route('information.index') }}</span>
        <span id="InformationUpdateURL" class="d-none">{{ route('information.update', [$information->id]) }}</span>
        <span id="InformationGetFirstURL" class="d-none">{{ route('information.getFirst') }}</span>
        <span id="InformationCoverImageURL" class="d-none">{{ asset($information->cover_image) }}</span>

        <information-update-form :information="information"></information-update-form>
    </div>

@endsection
