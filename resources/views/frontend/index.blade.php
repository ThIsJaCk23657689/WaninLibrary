@extends('layouts.frontend.master')

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
	<section id="header">
        <header>
            <div class="bg_cover">
                {{-- <div class="coverText">
                    <h2>閱讀可以拓展視野，更擁有改變的力量。</h2>
                    <span>-拾本書堂-</span>
                </div> --}}
                <img class="background-image" src="{{ $information->showCoverImage() }}" alt="封面圖片">
            </div>

            <div class="header-button-container">
                <div class="header-button left">
                    <div class="header-text">
                        <h3 class="button-title">好書捐贈！</h3>
                        <span class="button-subtitle">為知識繼續傳遞與分享</span>
                    </div>
                    <div class="button-check-link">
                        <a href="{{ route('front.donations') }}">
                            <img src="{{ asset('images/frontend/icons/donate_btn.png') }}" alt="好書捐贈">
                        </a>
                    </div>
                </div>
                <div class="header-button right">
                    <div class="header-text">
                        <h3 class="button-title">免費索取書單</h3>
                        <span class="button-subtitle">或許它已陳舊泛黃，卻依舊是珍寶</span>
                    </div>
                    <div class="button-check-link">
                        <a href="{{ route('front.freeBooks') }}">
                            <img src="{{ asset('images/frontend/icons/free_btn.png') }}" alt="免費索取書單">
                        </a>
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
                                <div class="col-md-11 col-12">
                                    <div class="row newsRow {{ ($loop->last)?'mb-0':'' }}">
                                        <div class="col-md-3 col-12 newsDate">{{ $news->showDate() }}</div>
                                        <div class="col-md-7 col-8 newsTitle">{{ $news->showTitle() }}</div>
                                        <div class="col-md-2 col-4 readMore">
                                            <a href="#">閱讀更多</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12 newsFooter">
                                <a href="{{ route('front.announcements') }}">
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
        <div class="background">
            <div class="background-darkwhite"></div>
        </div>
        <div class="activity-container">
            <div class="activity-card">
                <div class="activity-visible">
                    <div class="slider">
                        <div class="base-area">
                            <div class="base-title-container">
                                <img src="{{ asset('images/frontend/icons/activty_icon_white.png') }}" alt="activity" class="base-icon">
                                <h1 class="base-title">近期活動</h1>
                            </div>
                            
                            @if(!is_null($activities_top))
                            <div class="base-content activity-content">
                                <div class="activity-unit-container left-side">
                                    
                                    <div class="activity-unit">
                                        <a href="{{ route('front.activities.show', [$activities_top->id]) }}" class="activity-link">
                                            <div class="activity-image">
                                                <img src="{{ asset($activities_top->cover_image) }}" alt="">
                                                <div class="image-gray"></div>
                                            </div>
                                            <div class="activity-info">
                                                <div class="activity-date">{{ $activities_top->showDate() }}</div>
                                                <div class="activity-title">{{ $activities_top->showTitle() }}</div>
                                                <div class="activity-readmore">了解更多 >></div>
                                            </div>
                                            @if($activities_top->isNew())
                                                <div class="activity-new-container">
                                                    <span class="activity-new">NEW</span>
                                                </div>
                                            @endif
                                        </a>
                                    </div>

                                </div>

                                @if($activities->isNotEmpty())
                                    <div class="activity-unit-container right-side">
                                        
                                        @foreach($activities as $activity)
                                            <div class="activity-unit">
                                                <a href="{{ route('front.activities.show', [$activity->id]) }}" class="activity-link">
                                                    <div class="activity-image">
                                                        <img src="{{ asset($activity->cover_image) }}" alt="">
                                                        <div class="image-gray"></div>
                                                    </div>
                                                    <div class="activity-info">
                                                        <div class="activity-date">{{ $activity->showDate() }}</div>
                                                        <div class="activity-title">{{ $activity->showTitle() }}</div>
                                                        <div class="activity-readmore">了解更多 >></div>
                                                    </div>
                                                </a>
                                            </div>
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

                            <div class="switch-link-container">
                                @if($recommendation_books->isNotEmpty())
                                    <div class="switch-link">
                                        <span>查看{{ $recommendation_title }}</span>
                                        <img src="{{ asset('images/frontend/icons/click_hand.png') }}" alt="">
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if($recommendation_books->isNotEmpty())
                            <div class="base-area">
                                <div class="base-title-container">
                                    <img src="{{ asset('images/frontend/icons/book_icon_white.png') }}" alt="activity" class="base-icon">
                                    <h1 class="base-title">{{ $recommendation_title }}</h1>
                                </div>
                                <div class="base-content recommendation-content">
                                    @for($i = 0; $i < 10; $i ++)
                                        @if($i == 0 || $i == 5)
                                            <div class="recommendation-row">
                                        @endif
                                        
                                        <div class="book-image">
                                            <a href="{{ route('front.books.show', $recommendation_books[$i]->id) }}" class="book-link">
                                                <img src="{{ $recommendation_books[$i]->showCoverImage() }}" alt="{{ $recommendation_books[$i]->title }}">
                                            </a>
                                        </div>

                                        @if($i == 4 || $i == 9)
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                                <div class="switch-link-container-recommendation">
                                    <div class="switch-link">
                                        <img src="{{ asset('images/frontend/icons/check_it_out.png') }}" alt="">
                                        <span>查看近期活動</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
