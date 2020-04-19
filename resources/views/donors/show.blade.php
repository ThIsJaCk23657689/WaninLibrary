@extends('layouts.backend.master')

@push('CustomJS')
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('donors.index') }}">{{ __('Donors') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Show') }}</li>
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">機構名稱</label>
                        <input id="name" name="name" type="text" class="form-control mb-2" value="{{ $donor->name ?? '無' }}" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel">電話</label>
                        <input id="tel" name="tel" type="text" class="form-control mb-2" value="{{ $donor->tel ?? '無' }}" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="principal">負責人</label>
                        <input id="principal" name="principal" type="text" class="form-control" value="{{ $donor->principal ?? '無' }}" readonly>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">地址</label>
                        <input id="address" name="address" type="text" class="form-control" value="{{ $donor->showAddress() }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="5" readonly>{{ $donor->content ?? '無' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('donors.edit', [$donor->id]) }}" class="btn btn-block btn-success">
                        編輯修改
                    </a>
                    <a href="{{ route('donors.index') }}" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
