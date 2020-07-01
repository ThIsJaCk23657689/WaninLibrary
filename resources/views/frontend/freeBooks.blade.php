@extends('layouts.frontend.master')

@push('CustomJS')
	<script src="{{ asset('js/frontend/freebooks/index.js') }}" defer></script>
@endpush

@push('CustomCSS')
	<link href="{{  asset('css/frontend/freebooks/index.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div id="content-freebook">
    <section class="content-page-header">
        <header>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <img src="{{ asset('images\frontend\icons\book_icon.png') }}" class="title-icon" alt="免費索取書單">
                    <h1>免費索取書單</h1>
                </div>
            </div>
        </header>
    </section>

    <section class="content-page-body">
        <div class="container">
			
			<book-filter :filter="filter" v-on:refresh-book="refreshBook"></book-filter>

            <freebook-container :books="books"></freebook-container>
            <content-paginate :current-page="currentPage" :total-page="totalPage" v-on:chage-page="chagePage"></content-paginate>

            <span id="GetBooksList" class="d-none">{{ route('frontend.books.getList') }}</span>

        </div>
    </section>
</div>
@endsection
