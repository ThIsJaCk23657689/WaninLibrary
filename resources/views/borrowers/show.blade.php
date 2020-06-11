@extends('layouts.backend.master')

@push('CustomJS')
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('borrowers.index') }}">{{ __('Borrowers') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Show') }}</li>
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">借閱人姓名</label>
                        <input id="name" name="name" type="text" class="form-control mb-2" value="{{ $borrower->name ?? '無' }}" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel">電話</label>
                        <input id="tel" name="tel" type="text" class="form-control mb-2" value="{{ $borrower->tel ?? '無' }}" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday">生日</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="{{ $borrower->birthday ?? '無' }}" readonly>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">信箱</label>
                        <input id="email" name="email" type="text" class="form-control" value="{{ $borrower->email ?? '無' }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="agency">隸屬單位</label>
                        <input id="agency" name="agency" type="text" class="form-control" value="{{ $borrower->showAgencyName() ?? '無' }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_title">職稱</label>
                        <input id="job_title" name="job_title" type="text" class="form-control" value="{{ $borrower->job_title ?? '無' }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">身分別</label>
                        <input id="status" name="status" type="text" class="form-control" value="{{ $borrower->showStatus() }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="activated">狀態</label>
                        <input id="activated" name="activated" type="text" class="form-control" value="{{ $borrower->showActivated() }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">地址</label>
                        <input id="address" name="address" type="text" class="form-control" value="{{ $borrower->showAddress() }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="counts">總借閱數量</label>
                        <input id="counts" name="counts" type="text" class="form-control" value="{{ $borrower->borrowCounts() ?? '0' }}" readonly>                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expiredCounts">逾期數量</label>
                        <input id="expiredCounts" name="expiredCounts" type="text" class="form-control" value="{{ $borrower->expiredCounts() ?? '0' }}" readonly>                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="5" readonly>{{ $borrower->content ?? '無' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('borrowers.edit', [$borrower->id]) }}" class="btn btn-block btn-success">
                        編輯修改
                    </a>
                    <a href="{{ route('borrowers.index') }}" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
