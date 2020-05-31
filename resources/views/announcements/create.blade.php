@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('js/announcements/create.js') }}" defer></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}" ></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
        <li class="breadcrumb-item">
            <a href="#">{{ __('Basic:') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('announcements.index') }}">{{ __('News') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Create') }}</li>
    @endcomponent

    <div id="announcement">
        <span id="AnnouncementsIndexURL" class="d-none">{{ route('announcements.index') }}</span>
        <span id="AnnouncementsStoreURL" class="d-none">{{ route('announcements.store') }}</span>

        <announcement-create-form></announcement-create-form>
    </div>

@endsection
