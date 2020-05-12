@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('js/activities/create.js') }}" defer></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('agencies.index') }}">{{ __('Agencies') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Create') }}</li>
    @endcomponent
    
    <div id="activity">
        <span id="CKEditorUploadURL" class="d-none">{{ route('ckeditor.upload') }}</span>
        <activity-create-form></activity-create-form>
    </div>

@endsection
