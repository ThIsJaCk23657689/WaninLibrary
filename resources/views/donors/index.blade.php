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
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

	<div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('donors.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增捐贈人
			</a>
		</div>
    </div>
	
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			捐贈人列表
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
                            <th>編號</th>
							<th>名稱</th>
							<th>聯絡方式</th>
							<th>曝光程度</th>
							<th>捐贈數量</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($donors as $donor)
							<tr>
                                <td>{{ $donor->id }}</td>
								<td>{{ $donor->name }}</td>
								<td>{{ $donor->showContact() }}</td>
								<td>{{ $donor->showExposure() }}</td>
								<td>{{ $donor->books->count() }}</td>
								<td>
									<a href="{{ route('donors.show', [$donor->id]) }}" class="btn btn-md btn-info">
										<i class="fas fa-info-circle"></i>
									</a>
									<a href="{{ route('donors.edit', [$donor->id]) }}" class="btn btn-md btn-success">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a href="#" class="btn btn-md btn-danger" onclick="
										event.preventDefault();
										ans = confirm('確定要刪除此捐贈人嗎?');
										if(ans){
											$('#deleteform-{{ $donor->id }}').submit();
										}
									">
										<i class="far fa-trash-alt"></i>
									</a>
									<form id="deleteform-{{ $donor->id }}" action="{{ route('donors.destroy', [$donor->id]) }}" method="POST" style="displat: none;">
										@csrf
										@method('DELETE')
									</form>
								</td>
							</tr>	
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection
