@extends('layouts.backend.master')


@push('CustomJS')
    <script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
    <script src="{{ asset('js/announcements/index.js') }}" defer></script>
@endpush


@section('content')

    @component('components.breadcrumbs')
        <li class="breadcrumb-item">
            <a href="#">{{ __('Basic:') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('announcements.index') }}">{{ __('News') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">標題</label>
                        <input id="title" name="title" type="text" class="form-control" value="{{ $announcement->title }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">內容</label>
                        <div name="content" id="content" class='ck-content'>{!! $announcement->content ?? '無' !!}</div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('announcements.edit', [$announcement->id]) }}" class="btn btn-block btn-success">
                        編輯修改
                    </a>
                    <a href="{{ route('announcements.index') }}" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
