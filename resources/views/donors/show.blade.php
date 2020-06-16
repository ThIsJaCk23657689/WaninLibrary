@extends('layouts.backend.master')

@push('CustomJS')
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
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
                        <label for="name">捐贈人(單位)名稱</label>
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
                        <label for="principal">負責人/單位聯絡窗口</label>
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

            <div class="row justify-content-center">
                <div class="col-md-12">
                     <!-- DataTables Example -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            捐書列表
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>書籍條碼</th>
                                            <th>書籍名稱</th>
                                            <th>書籍狀態</th>
                                            <th>借閱次數</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donor->books as $book)
                                            <tr>
                                                <td>{{ $book->barcode }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->showStatus() }}</td>
                                                <td>{{ $book->count }}</td>
                                                <td>
                                                    <a href="{{ route('books.show', [$book->id]) }}" class="btn btn-md btn-info">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
