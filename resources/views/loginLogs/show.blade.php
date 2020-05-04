@extends('layouts.backend.master')

@push('CustomJS')
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('loginLogs.index') }}">{{ __('Login') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Show') }}</li>
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">使用者編號</label>
                        <input id="name" name="name" type="text" class="form-control mb-2" value="{{ $log->user_id ?? '無' }}" readonly>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">
                        <label for="tel">使用者姓名</label>
                        <div class="row">
                            <div class="col-md-9">
                                <input id="tel" name="tel" type="text" class="form-control mb-2" value="{{ $log->user->name ?? '無' }}" readonly>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('users.show', [$log->user_id]) }}" class="btn btn-md btn-info">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

                {{-- <div class="col-md-2">
                    <div class="form-group mb-2">
                        <label for="" style="color: white">__</label>
                        <a href="{{ route('users.show', [$log->user_id]) }}" class="form-control btn btn-md btn-info">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </div>

                </div> --}}


            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="principal">登入時間</label>
                        <input id="principal" name="principal" type="text" class="form-control" value="{{ $log->created_at ?? '無' }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="principal">登出時間</label>
                        <input id="principal" name="principal" type="text" class="form-control" value="{{ $log->logout_date ?? '無' }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        @if ($log->logout_date == Null && $log->content == '系統於2小時後自動登出')
                            <textarea name="content" id="content" class="form-control" cols="30" rows="5" readonly>{{ $log->content }}</textarea>
                        @else
                            <textarea name="content" id="content" class="form-control" cols="30" rows="5" readonly>無</textarea>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('loginLogs.index') }}" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
