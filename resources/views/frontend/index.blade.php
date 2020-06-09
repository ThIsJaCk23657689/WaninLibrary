@extends('layouts.frontend.master')

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
	<section id="header">
        <header>
            <img class="background-image" src="{{ asset('images/informations/cover_images/1589699289.jpeg') }}" alt="封面圖片">
            <div id="headerbox" class="container-fluid">
                <div class="row">
                    <div class="left col-md-6">
                        <span>有不要的二手書嗎？</span>
                        <h3>好書捐贈！</h3>
                        <div class="checkBtn">
                            <a href="#">
                                <img src="{{ asset('images/frontend/icons/donate_btn.png') }}" alt="好書捐贈">
                            </a>
                        </div>
                    </div>
                    <div class="right col-md-6">
                        <span>趕快去瞧瞧！</span>
                        <h3>免費索取書單</h3>
                        <div class="checkBtn">
                            <a href="#">
                                <img src="{{ asset('images/frontend/icons/free_btn.png') }}" alt="免費索取書單">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </section>

    <section id="news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <div id="newsIcon" class="mr-2">
                            <img src="{{ asset('images/frontend/icons/announcement.png') }}" alt="announcement">
                        </div>
                        即時公告/重要訊息
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="newsTable">
                    <div class="row">
                        @foreach($newsList as $news)
                            <div class="col-md-11">
                                <div class="row newsRow">
                                    <div class="col-md-3 newsDate">{{ $news->showDate() }}</div>
                                    <div class="col-md-7 newsTitle">{{ $news->title }}</div>
                                    <div class="col-md-2 readMore">
                                        <a href="#">閱讀更多</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12 newsFooter">
                            <a href="#">
                                查看更多公告及訊息
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="activity">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            <div id="activityIcon" class="mr-2">
                                <img src="{{ asset('images/frontend/icons/activity.png') }}" alt="activity">
                            </div>
                            近期活動
                        </h1>
                    </div>
                </div>
                <div class="row activityRow">
                    <div class="col-md-6">
                        <a href="#" class="activity_unit_top">
                            <div class="cover_image">
                                <img src="{{ asset('images/activities/cover_images/1589811603.jpeg') }}" alt="">
                                <div class="activity_text">
                                    <span class="datetime">2020.05.20</span>
                                    <h3 class="title">拾本書堂親子劇場世界閱讀日，為配合防疫，將在台中科技大學資訊樓演出</h3>
                                    <div class="readmore">
                                        <span>了解更多 >></span>
                                    </div>
                                </div>
                                <div class="gray"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="activity_unit">
                            <div class="row" style="height: 50%; padding-bottom:12px;">
                                <div class="col-md-6">
                                    <div class="cover_image">
                                        <img src="{{ asset('images/activities/cover_images/1589811603.jpeg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="activity_text">
                                        <span class="datetime">2020.05.20</span>
                                        <h4 class="title">拾本書堂親子劇場世界閱讀日，為配合防疫，將在台中科技大學資訊樓演出</h4>
                                        <div class="readmore">
                                            <span>了解更多 >></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="activity_unit">
                            <div class="row" style="height: 50%; padding-top:12px;">
                                <div class="col-md-6">
                                    <div class="cover_image">
                                        <img src="{{ asset('images/activities/cover_images/1589811603.jpeg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="activity_text">
                                        <span class="datetime">2020.05.20</span>
                                        <h4 class="title">拾本書堂親子劇場世界閱讀日，為配合防疫，將在台中科技大學資訊樓演出</h4>
                                        <div class="readmore">
                                            <span>了解更多 >></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkRecommendationBtn">
                            <span>查看老饕最愛拾本書單</span>
                            <img src="{{ asset('images/frontend/icons/click_hand.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
