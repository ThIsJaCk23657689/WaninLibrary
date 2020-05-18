@extends('layouts.backend.master')


@push('CustomJS')
    <script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
    <script src="{{ asset('js/activities/index.js') }}" defer></script>
@endpush


@section('content')

    @component('components.breadcrumbs')
        <li class="breadcrumb-item">
            <a href="#">{{ __('Basic:') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('activities.index') }}">{{ __('Events') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">標題</label>
                        @if ($activity->is_top)
                            <i class="fas fa-star"></i>
                        @endif
                        <input id="title" name="title" type="text" class="form-control" value="{{ $activity->title }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <label for="content">封面圖片</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <img src="{{asset($activity->cover_image)}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">內容</label>
                        <div name="content" id="content" class='ck-content'>{!! $activity->content ?? '無' !!}</div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('activities.edit', [$activity->id]) }}" class="btn btn-block btn-success">
                        編輯修改
                    </a>
                    <a href="{{ route('activities.index') }}" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
