@extends('layouts.frontend.master')

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
	<section id="header">
        <header>
            <img class="background-image" src="{{ asset('images\informations\cover_images\1589699289.jpeg') }}" alt="封面圖片">
            <div id="headerbox" class="container-fluid">
                <div class="row">
                    <div class="left col-md-6">
                        <span>有不要的二手書嗎？</span>
                        <h3>好書捐贈！</h3>
                    </div>
                    <div class="right col-md-6">
                        <span>趕快去瞧瞧！</span>
                        <h3>免費索取書單</h3>
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

    {{--  <section>

    </section> --}}
@endsection
