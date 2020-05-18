@extends('layouts.backend.master')

@push('CustomJS')
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('General Settings') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('information.index') }}">{{ __('Information') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Show') }}</li>
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">信箱</label>
                        <input id="email" name="email" type="text" class="form-control mb-2" value="{{ $information->email ?? '無' }}" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel">電話</label>
                        <input id="tel" name="tel" type="text" class="form-control mb-2" value="{{ $information->tel ?? '無' }}" readonly>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">地址</label>
                        <input id="address" name="address" type="text" class="form-control mb-2" value="{{ $information->address ?? '無' }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="open_at">開館時間</label>
                        <input id="open_at" name="open_at" type="text" class="form-control mb-2" value="{{ $information->open_at ?? '無' }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="close_at">閉館時間</label>
                        <input id="close_at" name="close_at" type="text" class="form-control mb-2" value="{{ $information->close_at ?? '無' }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <img src="{{asset($information->cover_image)}}" alt="" class="img-fluid">
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <a href="{{ route('information.edit', [1]) }}" class="btn btn-block btn-success">
                            編輯修改
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
