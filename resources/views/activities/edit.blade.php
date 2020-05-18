@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('js/activities/edit.js') }}" defer></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}" ></script>

@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Basic:') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('activities.index') }}">{{ __('Events') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Edit') }}</li>
    @endcomponent

    <div id="activity">
        <span id="CKEditorUploadURL" class="d-none">{{ route('ckeditor.upload') }}</span>
        <span id="ActivitiesIndexURL" class="d-none">{{ route('activities.index') }}</span>
        <span id="ActivitiesGetOneURL" class="d-none">{{ route('activities.getOne', [$activity->id]) }}</span>
        <span id="ActivitiesUpdateURL" class="d-none">{{ route('activities.update', [$activity->id]) }}</span>

        <span id="ActivitiesCoverImageURL" class="d-none">{{ asset($activity->cover_image) }}</span>
        <activity-update-form :activity='activity' :content="content"></activity-update-form>
    </div>

@endsection
