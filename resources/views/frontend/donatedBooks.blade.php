@extends('layouts.frontend.master')

@push('CustomJS')
	<script src="{{ asset('js/frontend/donatedBooks/index.js') }}" defer></script>
@endpush

@push('CustomCSS')
    <link href="{{  asset('css/frontend/donatedBooks/index.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div id="content-donated-book">
    <section class="content-page-header">
        <header>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <img src="{{ asset('images\frontend\icons\donatedBook_icon.png') }}" class="title-icon" alt="捐贈書籍查詢">
                    <h1>捐贈書籍查詢</h1>
                </div>
            </div>
        </header>
    </section>

    <section class="content-page-body">
        <div class="container">

            <donated-book-form></donated-book-form>

            <span id="GetDonatedBooksURL" class="d-none">{{ route('frontend.donor.searchDonatedBooks') }}</span>

        </div>
    </section>
</div>
@endsection
