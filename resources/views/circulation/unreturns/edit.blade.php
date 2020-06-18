@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/circulation/unreturns/edit.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('unreturns.index') }}">借出與逾期</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Edit') }}</li>
    @endcomponent

    <div id="unreturn">
        <span id="UnreturnIndexURL" class="d-none">{{ route('unreturns.index') }}</span>
        <span id="UnreturnGetOneURL" class="d-none">{{ route('unreturns.getOne', [$unreturn->id]) }}</span>
        <span id="UnreturnUpdateURL" class="d-none">{{ route('unreturns.update', [$unreturn->id]) }}</span>

        <unreturn-update-form :unreturn="unreturn"></unreturn-update-form>
    </div>

@endsection
