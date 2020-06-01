@extends('layouts.backend.master')

@push('CustomJS')
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
	<script src="{{ asset('js/admin/demo/chart-area-demo.js') }}" defer></script>
@endpush 

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Dashboard') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Index') }}</li>
	@endcomponent
	
	@include('partials.backend.iconcards')
	
	@include('partials.backend.examplechart')
	
	<!-- DataTables Example -->
	{{-- <div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			藝人資料
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>id</th>
							<th>Name</th>
							<th>introduce</th>
							<th>genre_id</th>
							<th>created_at</th>
							<th>updated_at</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>id</th>
							<th>Name</th>
							<th>introduce</th>
							<th>genre_id</th>
							<th>created_at</th>
							<th>updated_at</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach ($artists as $artist)
							<tr>
								<td>{{ $artist->id }}</td>
								<td>{{ $artist->name }}</td>
								<td>{{ $artist->introduce }}</td>
								<td>{{ $artist->genre->name }}</td>
								<td>{{ $artist->created_at }}</td>
								<td>{{ $artist->updated_at }}</td>
								<td>
									<a href="#" class="btn btn-md btn-success">編輯</a>
									<a href="#" class="btn btn-md btn-danger">刪除</a>
								</td>
							</tr>	
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
	</div> --}}
	
@endsection
