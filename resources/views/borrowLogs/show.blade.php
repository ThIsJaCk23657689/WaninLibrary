@extends('layouts.backend.master')

@push('CustomJS')
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Log File') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('borrowLogs.index') }}">借還書</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Show') }}</li>
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">借閱人編號</label>
                        <input id="name" name="name" type="text" class="form-control mb-2" value="{{ $log->borrower_id }}" readonly>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="form-group">
                        <label for="tel">借閱人姓名</label>
                        <div class="row">
                            <div class="col-md-9">
                                <input id="tel" name="tel" type="text" class="form-control mb-2" value="{{ $log->borrower_name ?? '無' }}" readonly>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('borrowers.show', [$log->borrower_id]) }}" class="btn btn-md btn-info">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>




            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="principal">書籍編號</label>
                        <input id="principal" name="principal" type="text" class="form-control" value="{{ $log->book_id ?? '無' }}" readonly>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="principal">書籍名稱</label>
                        <input id="principal" name="principal" type="text" class="form-control" value="{{ $log->book_title ?? '無' }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="principal">索書號</label>
                        <input id="principal" name="principal" type="text" class="form-control" value="{{ $log->callnum ?? '無' }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="principal">日期</label>
                        <input id="principal" name="principal" type="text" class="form-control" value="{{ $log->created_at ?? '無' }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="principal">狀態</label>
                        <input id="principal" name="principal" type="text" class="form-control" value="{{ $log->showStatus() ?? '無' }}" readonly>
                    </div>
                </div>
            </div>



            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('borrowLogs.index') }}" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
