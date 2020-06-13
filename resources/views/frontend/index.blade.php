@extends('layouts.frontend.master')

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
	<section id="header">
        <header>
            <div class="bg_cover">
                <div class="coverText">
                    <h2>閱讀可以拓展視野，更擁有改變的力量。</h2>
                    <span>-拾本書堂-</span>
                </div>
                <img class="background-image" src="{{ $information->showCoverImage() }}" alt="封面圖片">
            </div>
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
            @if($newsList->isNotEmpty())
                <div class="row">
                    <div class="newsTable">
                        <div class="row">
                            @foreach($newsList as $news)
                                <div class="col-md-11">
                                    <div class="row newsRow">
                                        <div class="col-md-3 newsDate">{{ $news->showDate() }}</div>
                                        <div class="col-md-7 newsTitle">{{ $news->showTitle() }}</div>
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
            @else
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>沒有任何公告和消息</h2>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section id="activity">
        <div class="content">
            <div id="activity_container" class="container">
                <div class="slider">
                    <div class="activities-area">
                        <div class="container" style="padding-top: 0px;">
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
                            @if(!is_null($activities_top))
                                <div class="row activityRow">
                                    <div class="col-md-6">
                                        <a href="#" class="activity_unit_top">
                                            <div class="cover_image">
                                                <img src="{{ asset($activities_top->cover_image) }}" alt="">
                                                <div class="activity_text">
                                                    <span class="datetime">{{ $activities_top->showDate() }}</span>
                                                    <h3 class="title">{{ $activities_top->showTitle() }}</h3>
                                                    <div class="readmore">
                                                        <span>了解更多 >></span>
                                                    </div>
                                                </div>
                                                <div class="gray"></div>
                                            </div>
                                        </a>
                                    </div>
                                    @if($activities->isNotEmpty())
                                        <div class="col-md-6">
                                            @foreach($activities as $activity)
                                                <a href="#" class="activity_unit">
                                                    <div class="row" style="height: 50%; {{ ($loop->iteration == 1)?'padding-bottom:12px;':'padding-top:12px;' }}">
                                                        <div class="col-md-6">
                                                            <div class="cover_image">
                                                                <img src="{{ asset($activity->cover_image) }}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="activity_text">
                                                                <span class="datetime">{{ $activity->showDate() }}</span>
                                                                <h4 class="title">{{ $activity->showTitle() }}</h4>
                                                                <div class="readmore">
                                                                    <span>了解更多 >></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2>近期沒有活動</h2>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkRecommendationBtn">
                                        <span>查看{{ $recommendation_title }}</span>
                                        <img src="{{ asset('images/frontend/icons/click_hand.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recommandation-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>
                                        <div id="activityIcon" class="mr-2">
                                            <img src="{{ asset('images/frontend/icons/book.png') }}" alt="activity">
                                        </div>
                                        {{ $recommendation_title }}
                                    </h1>
                                </div>
                            </div>
                            <div class="row bookTable">
                                <div class="col-md-12">
                                    @for($i = 0; $i < 10; $i ++)
                                        @if($i == 0 || $i == 5)
                                            <div class="row">
                                        @endif

                                            <div class="col-md bookCol">
                                                <a href="#">
                                                    <img src="{{ $recommendation_books[$i]->showCoverImage() }}" alt="{{ $recommendation_books[$i]->title }}">
                                                </a>
                                            </div>

                                        @if($i == 4 || $i == 9)
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkRecommendationBtn">
                                        <img src="{{ asset('images/frontend/icons/check_it_out.png') }}" alt="">
                                        <span>查看近期活動</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
