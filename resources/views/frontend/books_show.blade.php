@extends('layouts.frontend.master')

@push('CustomCSS')
    <link href="{{  asset('css/frontend/books/show.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('CustomJS')
	{{-- <script src="{{ asset('js/frontend/index.js') }}" defer></script> --}}
@endpush

@section('content')
<section class="detail-page-header">
    <header>
        <div class="book-detail-title flex-center position-ref full-height">
            <div class="book-detail-title-container">
                <div class="book-detail-title-content text-center ">
                    <h1>{{ $book->title }}</h1>
                    <h2>{{ $book->subtitle }}</h2>
                </div>
            </div>
        </div>
    </header>
</section>

<section class="detail-page-body">
    <div class="container">

        <div class="book-detail-container">
            <div class="row book-detail-row">
                <div class="col-md-6 book-detail-row-left">
                    <div class="row book-detail-img">
                        <div class="col-md-12">
                            <img src="{{ asset($book->showCoverImage()) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            書籍來源&nbsp;:&nbsp;{{ $book->source  ?? "無" }}
                        </div>
                    </div>
                </div>
                {{-- 雜誌期刊類 --}}
                @if ($book->category == 11 || $book->category == 12)
                <div class="col-md-6 paper-detail-info book-detail-row-right">
                    <div class="row">
                        <div class="col-md-12 paper-row-col">
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    <span>作者&nbsp;:&nbsp;</span>
                                    <p>{{ $book->author ?? "無"  }}</p>
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    譯者&nbsp;:&nbsp;{{ $book->translator ?? "無"  }}
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    出版商&nbsp;:&nbsp;{{ $book->publisher ?? "無"  }}
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                期數/出版日期 :{{$book->edition ?? "無" }}/{{ $book->published_date ?? "無" }}
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    圖書類別&nbsp;:&nbsp;{{ $book->showCategory() ?? "無"  }}
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    語言別&nbsp;:&nbsp;{{ $book->language ?? "無"  }}
                                </div>
                            </div>
                            @if(!is_null($book->position))
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    書籍位置&nbsp;:&nbsp; {{ $book->position ?? "無" }}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @else
                {{-- 一般圖書類 --}}
                <div class="col-md-6 book-detail-info book-detail-row-right">
                    <div class="row">
                        <div class="col-md-12 book-row-col">
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    <span>作者&nbsp;:&nbsp;</span>
                                    <p>{{ $book->author ?? "無"  }}</p>
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    譯者&nbsp;:&nbsp;{{ $book->translator  ?? "無" }}
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    出版商&nbsp;:&nbsp;{{ $book->publisher ?? "無"  }}
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    <span>出版日期&nbsp;:&nbsp;{{ $book->published_date ?? "無"  }}&nbsp;/&nbsp;版次&nbsp;:&nbsp;{{ $book->edition  ?? "無"  }}</span>
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    ISBN&nbsp;:&nbsp; {{ $book->ISBN ?? "無"  }}
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    分類號&nbsp;:&nbsp; {{ $book->callnum ?? "無"  }}
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    圖書類別&nbsp;:&nbsp; {{ $book->showCategory() ?? "無"  }}
                                </div>
                            </div>
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    語言別&nbsp;:&nbsp; {{ $book->language  ?? "無" }}
                                </div>
                            </div>
                            @if(!is_null($book->position))
                            <div class="row book-rows">
                                <div class="col-md-12">
                                    書籍位置&nbsp;:&nbsp; {{ $book->position ?? "無" }}
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
                @endif

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
