@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('vendor/jQuery-TWzipcode-master/jquery.twzipcode.min.js') }}" defer></script>
    <script src="{{ asset('js/users/create.js') }}" defer></script>
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('users.index') }}">{{ __('Staffs') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Create') }}</li>
	@endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">
                        <span class="text-danger">*</span>
                        名稱
                    </label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gender" class="col-md-4 col-form-label text-md-right">
                        <span class="text-danger">*</span>
                        性別
                    </label>

                    <div class="col-md-6">
                        <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                            <option value="0">女</option>
                            <option value="1">男</option>
                        </select>

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jobTitle" class="col-md-4 col-form-label text-md-right">
                        <span class="text-danger">*</span>
                        職稱
                    </label>

                    <div class="col-md-6">
                        <select id="jobTitle" class="form-control @error('jobTitle') is-invalid @enderror" name="jobTitle">
                            @foreach ($jobTitles as $jobTitle)
                                @if($jobTitle->id != 4)
                                    <option value="{{ $jobTitle->id }}">{{ $jobTitle->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('jobTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">
                        <span class="text-danger">*</span>
                        信箱（帳號）
                    </label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">
                        <span class="text-danger">*</span>
                        密碼
                    </label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                        <span class="text-danger">*</span>
                        確認密碼
                    </label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="" autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="birthday" class="col-md-4 col-form-label text-md-right">
                        生日
                    </label>

                    <div class="col-md-6">
                        <input id="birthday" type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" autocomplete="off">

                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div id="twzipcode" class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">
                        地址
                    </label>
                    <div class="col-md-2">
                        <div data-role="county" data-style="form-control" data-name="address_county" data-value=""></div>
                    </div>
                    <div class="col-md-2">
                        <div data-role="district" data-style="form-control" data-name="address_district" data-value=""></div>
                    </div>
                    <div class="col-md-2">
                        <div data-role="zipcode" data-style="form-control" data-name="address_zipcode" data-value=""></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-md-4 col-md-6">
                        <input id="address_others" type="text" class="form-control @error('address_others') is-invalid @enderror" name="address_others" value="{{ old('address_others') }}">

                        @error('address_others')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認新增
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-block btn-danger">
                            返回列表
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
	
@endsection
