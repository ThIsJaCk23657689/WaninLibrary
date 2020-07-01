@extends('layouts.frontend.master')

@push('CustomJS')
	<script src="{{ asset('js/frontend/announcements/index.js') }}" defer></script>
@endpush

@push('CustomCSS')
	<link href="{{  asset('css/frontend/announcements/index.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div id="content-announcement">
    <section class="content-page-header">
        <header>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <img src="{{ asset('images\frontend\icons\announcement_icon.png') }}" class="title-icon" alt="即時公告 / 重要訊息">
                    <h1>即時公告 / 重要訊息</h1>
                </div>
            </div>
        </header>
    </section>

    <section class="content-page-body">
        <div class="container">
			
            <announcement-container :announcements="announcements"></announcement-container>
            <content-paginate :current-page="currentPage" :total-page="totalPage" v-on:chage-page="chagePage"></content-paginate>

            <span id="GetAnnouncementsList" class="d-none">{{ route('frontend.announcements.getList') }}</span>

        </div>
    </section>
</div>
@endsection
