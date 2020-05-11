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

    <div id="donor">
        <span id="InformationIndexURL" class="d-none">{{ route('information.index') }}</span>
        <span id="InformationUpdateURL" class="d-none">{{ route('information.update', [$information->id]) }}</span>
        <span id="InformationGetOneURL" class="d-none">{{ route('information.getOne', [$information->id]) }}</span>

        <information-update-form></information-update-form>
        <loading-modal></loading-modal>
    </div>

@endsection
