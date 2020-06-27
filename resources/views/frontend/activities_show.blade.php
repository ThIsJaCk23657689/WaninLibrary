@extends('layouts.frontend.master')

@push('CustomCSS')
    <link href="{{  asset('css/frontend/donations/index.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
<section class="detail-page-header">
    <header>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h1>{{ $activity->title }}</h1>
            </div>
        </div>
    </header>
</section>

<section class="content-page-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                {{-- <img src="{{ asset($donation_img) }}" width="100%" alt=""> --}}
            </div>
        </div>
        <div class="goback-container">
            <a href="#" class="goback-text" onclick="history.go(-1);">
                <i class="fas fa-arrow-left"></i>
                返回上一頁
            </a>
        </div>
    </div>
</section>
@endsection
