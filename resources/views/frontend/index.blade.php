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

    {{-- <section>

    </section>

    <section>

    </section> --}}
@endsection
