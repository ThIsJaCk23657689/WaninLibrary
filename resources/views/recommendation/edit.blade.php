@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/recommendation/edit.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Basic:') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('recommendation.index') }}">{{ __('Recommend') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Edit') }}</li>
    @endcomponent

    <div id="recommendation">
        <span id="RecommendationIndexURL" class="d-none">{{ route('recommendation.index') }}</span>
        <span id="RecommendationUpdateURL" class="d-none">{{ route('recommendation.update') }}</span>
        <span id="RecommendationGetFirstURL" class="d-none">{{ route('recommendation.getFirst') }}</span>
        <span id="RecommendationGetBookListURL" class="d-none">{{ route('recommendation.getBooksByName') }}</span>

        <recommendation-update-form></recommendation-update-form>
    </div>

@endsection
