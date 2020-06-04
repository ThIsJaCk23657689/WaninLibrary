@extends('layouts.backend.master')

@push('CustomJS')
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Statistics') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('statistic.export.index') }}">{{ __('Export') }}</a>
		</li>
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <a href="{{ route('statistic.donated.export') }}" class="btn btn-block btn-dark btn-lg">書籍捐贈報表</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <a href="{{ route('statistic.boughtbooks.export') }}" class="btn btn-block btn-dark btn-lg">書籍採購報表</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <a href="{{ route('statistic.borrowlogs.export') }}" class="btn btn-block btn-dark btn-lg">書籍借閱報表</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <a href="{{ route('statistic.topbooks.export') }}" class="btn btn-block btn-dark btn-lg">熱門書籍報表</a>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('backend') }}" class="btn btn-block btn-success">
                        返回首頁
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
