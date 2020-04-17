@extends('layouts.backend.master')

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('users.index') }}">{{ __('Staffs') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Show') }}</li>
	@endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">
                    員工名稱
                </label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">
                    性別
                </label>

                <div class="col-md-6">
                    <input id="gender" type="text" class="form-control" name="gender" value="{{ $user->showGender() }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="jobTitle" class="col-md-4 col-form-label text-md-right">
                    職稱
                </label>

                <div class="col-md-6">
                    <input id="jobTitle" type="text" class="form-control" name="jobTitle" value="{{ $user->jobTitle->name }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">
                    信箱
                </label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="email_verified_at" class="col-md-4 col-form-label text-md-right">
                    信箱驗證時間
                </label>

                <div class="col-md-6">
                    <input id="email_verified_at" type="text" class="form-control" name="email_verified_at" value="{{ $user->email_verified_at ?? '尚未驗證' }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="birthday" class="col-md-4 col-form-label text-md-right">
                    生日
                </label>

                <div class="col-md-4">
                    <input id="birthday" type="text" class="form-control" name="birthday" value="{{ $user->showBirthday() ?? '無' }}" disabled>
                </div>
                <div class="col-md-2">
                    <input id="age" type="text" class="form-control" name="age" value="{{ $user->showAge() }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    地址
                </label>
                <div class="col-md-2">
                    <input id="address_county" type="text" class="form-control" name="address_county" value="{{ $user->address_county ?? '無' }}" disabled>
                </div>
                <div class="col-md-2">
                    <input id="address_district" type="text" class="form-control" name="address_district" value="{{ $user->address_district ?? '無' }}" disabled>
                </div>
                <div class="col-md-2">
                    <input id="address_zipcode" type="text" class="form-control" name="address_zipcode" value="{{ $user->address_zipcode ?? '無' }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-md-4 col-md-6">
                    <input id="address_others" type="text" class="form-control" name="address_others" value="{{ $user->address_others ?? '無' }}" disabled>
                </div>
            </div>

            <hr>

            <div class="form-group row">
                <label for="updated_at" class="col-md-4 col-form-label text-md-right">
                    上次更新時間
                </label>

                <div class="col-md-6">
                    <input id="updated_at" type="text" class="form-control" name="updated_at" value="{{ $user->updated_at }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="created_at" class="col-md-4 col-form-label text-md-right">
                    註冊時間
                </label>

                <div class="col-md-6">
                    <input id="created_at" type="text" class="form-control" name="created_at" value="{{ $user->created_at }}" disabled>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-block btn-success">
                        編輯資料
                    </a>
                    <a href="{{ route('users.index') }}" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>

        </div>
    </div>
	
@endsection
