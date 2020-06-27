@extends('layouts.frontend.master')

@push('CustomCSS')
    <link href="{{  asset('css/frontend/donations/index.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
<section id="donation">
    <header>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img src="{{ asset('images\frontend\icons\book_icon.png') }}" class="title-icon" alt="好書捐贈">
                <h1>關於拾本書堂</h1>
            </div>
        </div>
    </header>
</section>

<section id="donation-content">
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
