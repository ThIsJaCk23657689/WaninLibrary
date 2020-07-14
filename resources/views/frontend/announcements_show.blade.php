@extends('layouts.frontend.master')

@push('CustomCSS')
    <link href="{{  asset('css/frontend/announcements/show.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
<section class="announcement-detail">
    <div class="content-container full-height">
        <header>
            <div class="announcement-detail-title">
                <div class="announcement-detail-title-container">
                    <div class="announcement-detail-title-content">
                        <h1>{{ $announcement->title }}</h1>
                    </div>
                    <div class="announcement-detail-date">
                        <h2>{{ $announcement->showDay() }}</h2>
                        <span>{{ $announcement->showMonth() }}<br>{{ $announcement->showYear() }}</span>
                    </div>
                </div>
            </div>
        </header>
        <div class="annoucement-detail-content">
            <div class="row announcement-detail-row">
                <div class="col-md-12">
                    {!! $announcement->content !!}

                </div>
            </div>
        </div>

    </div>
</section>

<section class="detail-page-body">
    <div class="container">
        <div class="goback-container">
            <a href="#" class="goback-text" onclick="history.go(-1); event.preventDefault();">
                <i class="fas fa-arrow-left"></i>
                返回上一頁
            </a>
        </div>
    </div>
</section>
{{-- <section class="detail-page-header">
    <header>
        <div class="announcement-detail-title">
            <div class="announcement-detail-title-container">
                <div class="announcement-detail-title-content">
                    <h1>{{ $announcement->title }}</h1>
                </div>
                <div class="announcement-detail-date">
                    <h2>{{ $announcement->showDay() }}</h2>
                    <span>{{ $announcement->showMonth() }}<br>{{ $announcement->showYear() }}</span>
                </div>
            </div>
        </div>
    </header>
</section> --}}

@endsection
