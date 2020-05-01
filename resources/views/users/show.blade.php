@extends('layouts.backend.master')

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('users.index') }}">{{ __('Admins') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Show') }}</li>
	@endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">姓名</label>
                        <input id="name" name="name" type="text" class="form-control mb-2" value="{{ $user->name }}" readonly>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="email">信箱</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status">帳號類型</label>
                        <select name="status" id="status" class="form-control" disabled>
                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>一般使用者</option>
                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>管理者</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="account">帳號</label>
                        <input id="account" name="account" type="text" class="form-control mb-2" value="{{ $user->account }}" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="created_at">建立時間</label>
                        <input id="created_at" name="created_at" type="text" class="form-control mb-2" value="{{ $user->created_at }}" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="updated_at">更新時間</label>
                        <input id="updated_at" name="updated_at" type="text" class="form-control mb-2" value="{{ $user->updated_at }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel">電話</label>
                        <input id="tel" name="tel" type="text" class="form-control mb-2" value="{{ $user->tel }}" readonly>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="address">地址</label>
                        <input id="address" name="address" type="text" class="form-control" value="{{ $user->showAddress() }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="5" readonly>{{ $user->content }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    @if(auth('api')->id() == 1 || auth('api')->id() == $user->id)
                        <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-block btn-success">
                            編輯修改
                        </a>
                    @endif
                    <a href="{{ route('users.index') }}" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
