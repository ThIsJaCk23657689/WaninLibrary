@extends('layouts.frontend.master')

@push('CustomJS')
	<script src="{{ asset('js/frontend/activities/index.js') }}" defer></script>
@endpush

@push('CustomCSS')
    <link href="{{  asset('css/frontend/activities/index.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div id="content-activity">
    <section class="content-page-header">
        <header>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <img src="{{ asset('images\frontend\icons\activty_icon.png') }}" class="title-icon" alt="近期活動">
                    <h1>近期活動</h1>
                </div>
            </div>
        </header>
    </section>

    <section class="content-page-body">
        <div class="container">

            <div class="row switch-btn-row">
                <div class="col-md-6 switch-btn-container actived">
                    <a href="{{ route('front.activities') }}" class="switch-btn text-center">近期活動</a>
                </div>
                <div class="col-md-6 switch-btn-container">
                    <a href="{{ route('front.recommandations') }}" class="switch-btn text-center">主題書單</a>
                </div>
            </div>

            <activity-container :activities="activities"></activity-container>
            <content-paginate :current-page="currentPage" :total-page="totalPage" v-on:chage-page="chagePage"></content-paginate>

            <span id="GetActivitiesList" class="d-none">{{ route('frontend.activities.getList') }}</span>

        </div>
    </section>
</div>
@endsection
