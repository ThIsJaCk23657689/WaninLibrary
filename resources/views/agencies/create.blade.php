@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/agencies/create.js') }}" defer></script>
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

    <div id="agency">
        <span id="AgenciesIndexURL" class="d-none">{{ route('agencies.index') }}</span>
        <span id="AgenciesStoreURL" class="d-none">{{ route('agencies.store') }}</span>
        <span id="NameIsIniqueURL" class="d-none">{{ route('agencies.nameIsInique') }}</span>

        <agency-create-form></agency-create-form>
    </div>

@endsection
