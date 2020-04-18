@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/agencies/edit.js') }}" defer></script>
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('agencies.index') }}">{{ __('Agencies') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Edit') }}</li>
    @endcomponent
    
    <div id="agency">
        <span id="AgenciesIndexURL" class="d-none">{{ route('agencies.index') }}</span>
        <span id="AgenciesGetOneURL" class="d-none">{{ route('agencies.getOne', [$agency->id]) }}</span>
        <span id="AgenciesUpdateURL" class="d-none">{{ route('agencies.update', [$agency->id]) }}</span>

        <agency-update-form></agency-update-form>
        <loading-modal></loading-modal>
    </div>

@endsection
