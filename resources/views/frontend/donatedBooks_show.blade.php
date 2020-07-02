@extends('layouts.frontend.master')

@push('CustomJS')
	<script src="{{ asset('js/frontend/donors/show.js') }}" defer></script>
@endpush

@push('CustomCSS')
	<link href="{{  asset('css/frontend/donors/show.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div id="content-donor-show">
    <section class="content-page-header">
        <header>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <img src="{{ asset('images\frontend\icons\donatedBook_icon.png') }}" class="title-icon" alt="捐贈人">
                    @if ($isSearched)
                        <h1>{{ $donor->name }}</h1>
                    @else
                        <h1>{{ $donor->showName() }}</h1>
                    @endif

                </div>
            </div>
        </header>
    </section>

    <section class="content-page-body">
        <div class="container">

            <donor-show-container :books="books" :is-searched="isSearched"></donor-show-container>
            <content-paginate :current-page="currentPage" :total-page="totalPage" v-on:chage-page="chagePage"></content-paginate>

            <span id="getDonorBooksList" class="d-none">{{ route('frontend.donor.getDonorBooksList') }}</span>
            <span id="getDonorId" class="d-none">{{ $donor->id }}</span>
            <span id="getIsSearched" class="d-none">{{ $isSearched }}</span>

        </div>
    </section>
</div>
@endsection
