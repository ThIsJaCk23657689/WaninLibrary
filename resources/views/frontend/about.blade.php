@extends('layouts.frontend.master')

@push('CustomCSS')
    <link href="{{  asset('css/frontend/about/index.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
<section class="content-page-header">
    <header>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img src="{{ asset('images\frontend\icons\about_icon.png') }}" class="title-icon" alt="關於拾本書堂">
                <h1>關於拾本書堂</h1>
            </div>
        </div>
    </header>
</section>

<section class="about-image-section">
    <div class="about-img">
        <img class="background-image" src="{{ asset('images\informations\cover_images\1591692000.jpeg') }}" width="100%" alt="關於拾本書堂">
    </div>
</section>

<section class="content-page-body">
    <div class="container">
        <div class="row about-detail-row-up">
            <div class="col-md-12">
                <p>
                    網銀基金會於2012年9月成立，以音樂教育為起點，提供家庭境遇弱勢與身心障礙的學童，免費學習音樂才藝的機會，預備完善師資及樂器，讓音樂學習為家庭帶進希望。一路走來，我們看見音樂為孩子們帶來的希望與成長，而網銀基金會深信我們可以做的更多更好!!
                    <br>
                    <br>
                    於2017年，網銀基金會開始計畫、籌備、成立一圖書館，期盼為弱勢學子助學盡一份心力，我們相信教育與學習可以翻轉人生，閱讀可以帶來改變，於2020年「拾本書堂」落成啟用。
                    <br>
                    <br>
                    「拾本書堂」：「拾」是重拾，是牽起每一雙手、每一份支持，藉由「拾本書堂」的創立，重拾對閱讀的喜愛、學習的熱情、正向的人生觀，並領略閱讀帶來的美好改變。
                    {{-- 拾本書堂與網銀基金會邀請大家一同走進這裡，拿起一本好書
                    ，盡情品味、享受閱讀。 --}}
                </p>
            </div>
        </div>
        {{-- <div class="row about-detail-row-down">
            <div class="about-detail-row flex-center position-ref full-height">
                <img class="detail-line-image" src="{{ asset('images/frontend/icons/about_left.png') }}" >
                <p>
                    拾本書堂與網銀基金會邀請大家一同走進這裡，<br>拿起一本好書，盡情品味、享受閱讀。
                </p>
                <img class="detail-line-image" src="{{ asset('images/frontend/icons/about_right.png') }}">
            </div>
        </div> --}}

        {{-- <div class="goback-container">
            <a href="#" class="goback-text" onclick="history.go(-1);">
                <i class="fas fa-arrow-left"></i>
                返回上一頁
            </a>
        </div> --}}
    </div>
</section>
<section class="about-down">
    <div class="row about-detail-row-down flex-center position-ref full-height">
        <div class="about-down-container">
            <div class="about-detail-row">
                <div class="about-down-images-left position-ref full-height">
                    <img class="detail-line-image-left" src="{{ asset('images/frontend/icons/about_left.png') }}" width="20%">
                </div>
                <p>
                    拾本書堂與網銀基金會邀請大家一同走進這裡，<br>拿起一本好書，盡情品味、享受閱讀。
                </p>
                <div class="about-down-images-right position-ref full-height">
                    <img class="detail-line-image-right" src="{{ asset('images/frontend/icons/about_right.png') }}">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
