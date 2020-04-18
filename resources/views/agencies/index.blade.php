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
            <a href="{{ route('agencies.index') }}">{{ __('Agencies') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

	<div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('agencies.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增機構
			</a>
		</div>
    </div>
	
	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			機構列表
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
                            <th>編號</th>
							<th>名稱</th>
							<th>負責人</th>
							<th>電話</th>
							<th>借閱人數量</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($agencies as $agency)
							<tr>
                                <td>{{ $agency->id }}</td>
								<td>{{ $agency->name }}</td>
								<td>{{ $agency->principal }}</td>
								<td>{{ $agency->tel }}</td>
								<td>0</td>
								<td>
									<a href="{{ route('agencies.show', [$agency->id]) }}" class="btn btn-md btn-info">
										<i class="fas fa-info-circle"></i>
									</a>
									<a href="{{ route('agencies.edit', [$agency->id]) }}" class="btn btn-md btn-success">
										<i class="fas fa-edit"></i>
									</a>
									<a href="#" class="btn btn-md btn-danger" onclick="
										event.preventDefault();
										ans = confirm('確定要下架此商品嗎?');
										if(ans){
											$('#deleteform-{{ $agency->id }}').submit();
										}
									">
										<i class="far fa-trash-alt"></i>
									</a>
									<form id="deleteform-{{ $agency->id }}" action="{{ route('agencies.destroy', [$agency->id]) }}" method="POST" style="displat: none;">
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
