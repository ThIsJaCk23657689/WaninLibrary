@extends('layouts.frontend.master')

@push('CustomCSS')
    <link href="{{  asset('css/frontend/activities/show.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
<section class="detail-page-header">
    <header>
        @if ($activity->type == 1)
        {{-- 近期活動 --}}
            <div class="activity-detail-title">
                <div class="activity-detail-title-container">
                    <div class="activity-detail-title-content">
                        <h1>{{ $activity->title }}</h1>
                    </div>
                    <div class="activity-detail-date">
                        <h2>{{ $activity->showDay() }}</h2>
                        <span>{{ $activity->showMonth() }}<br>{{ $activity->showYear() }}</span>
                    </div>
                </div>
            </div>
        @else
        {{-- 主題書單 --}}
        <div class="recommandation-detail-title flex-center position-ref full-height">
            <div class="recommandation-detail-title-container">
                <div class="recommandation-detail-title-content text-center ">
                    <h1>{{ $activity->title }}</h1>
                </div>
            </div>
        </div>
        @endif

    </header>
</section>

<section class="detail-page-body">
    <div class="container rwd-container">
        @if ($activity->type == 1)
        {{-- 近期活動 --}}
        <div class="row activity-detail-row">
            <div class="col-md-12">
                {!! $activity->content !!}

            </div>
        </div>
        @else
        {{-- 主題書單 --}}
        {{-- <img src="{{ asset($activity->showCoverImage()) }}" width="100%" alt=""> --}}
        <div class="row recommandation-detail-row">
            <div class="col-md-12">
                {!! $activity->content !!}
            </div>
        </div>
        @endif

        <div class="goback-container">
            <a href="#" class="goback-text" onclick="history.go(-1);">
                <i class="fas fa-arrow-left"></i>
                返回上一頁
            </a>
        </div>
    </div>
</section>
@endsection
