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
			<a href="{{ route('users.index') }}">{{ __('Staffs') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Index') }}</li>
	@endcomponent

    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('users.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增員工(後臺註冊)
			</a>
		</div>
    </div>
	
	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			員工資料
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>編號</th>
							<th>名稱</th>
							<th>性別</th>
							<th>年齡</th>
                            <th>職稱</th>
							<th>信箱</th>
							<th>縣市</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr class="{{ $user->trashed()?'bg-warning':'' }}">
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->showGender() }}</td>
								<td>{{ $user->showAge() }}</td>
                                <td>{{ $user->jobTitle->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->county ?? '無' }}</td>
								<td>
									<a href="{{ route('users.show', [$user->id]) }}" class="btn btn-md btn-info">
										<i class="fas fa-info-circle"></i>
										查看
									</a>
									@if($user->id != 1)
										<a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-md btn-success">
											<i class="fas fa-user-edit"></i>
											編輯
										</a>
										@if(Auth::id() != $user->id)
											@if($user->trashed())
												<a href="#" class="btn btn-md btn-light" onclick="
													event.preventDefault();
													ans = confirm('確定要解鎖此員工嗎?');
													if(ans){
														$('#deleteform-{{ $user->id }}').submit();
													}
												">
													<i class="fas fa-unlock"></i>
													解鎖
												</a>
											@else
												<a href="#" class="btn btn-md btn-danger" onclick="
													event.preventDefault();
													ans = confirm('確定要封鎖此員工嗎?');
													if(ans){
														$('#deleteform-{{ $user->id }}').submit();
													}
												">
													<i class="fas fa-user-slash"></i>
													封鎖
												</a>
											@endif

											<form id="deleteform-{{ $user->id }}" action="{{ route('users.destroy', [$user->id]) }}" method="POST" style="displat: none;">
												@csrf
												@method('DELETE')
											</form>
										@endif
									@endif
								</td>
							</tr>	
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted"> {{ __('Last Updated') }} {{ $lastUpdate??'無' }}</div>
	</div>
	
@endsection
