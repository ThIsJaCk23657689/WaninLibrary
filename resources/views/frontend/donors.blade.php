@extends('layouts.frontend.master')

@push('CustomJS')
	<script src="{{ asset('js/frontend/donors/index.js') }}" defer></script>
@endpush

@push('CustomCSS')
	<link href="{{  asset('css/frontend/donors/index.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div id="content-donor">
    <section class="content-page-header">
        <header>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <img src="{{ asset('images\frontend\icons\donatedBook_icon.png') }}" class="title-icon" alt="捐書芳名錄">
                    <h1>捐書芳名錄</h1>
                </div>
            </div>
        </header>
    </section>

    <section class="content-page-body">
        <div class="container">
			
			<donor-filter :filter="filter" v-on:refresh-donor="refreshDonor"></donor-filter>

            <donor-container :donors="donors"></donor-container>
            <content-paginate :current-page="currentPage" :total-page="totalPage" v-on:chage-page="chagePage"></content-paginate>

            <span id="GetDonorsList" class="d-none">{{ route('frontend.donors.getList') }}</span>

        </div>
    </section>
</div>
@endsection
