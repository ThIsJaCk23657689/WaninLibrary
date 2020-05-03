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
			<a href="{{ route('loginLogs.index') }}">{{ __('Login') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Index') }}</li>
	@endcomponent

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			使用者登入日誌
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>編號</th>
							<th>使用者編號</th>
							<th>使用者姓名</th>
							<th>登入時間</th>
							<th>登出時間</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->user_id }}</td>
                            <td>{{ $log->user->name }}</td>
                            <td>{{ $log->created_at }}</td>
                            <td>{{ $log->logout_date }}</td>
                        </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection
