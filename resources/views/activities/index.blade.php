@extends('layouts.backend.master')

@push('CustomJS')
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
	<script src="{{ asset('js/activities/index.js') }}" defer></script>
@endpush

@section('content')

    @component('components.breadcrumbs')
        <li class="breadcrumb-item">
            <a href="#">{{ __('Basic:') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('activities.index') }}">{{ __('Events') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

	<div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('activities.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增活動
			</a>
		</div>
    </div>

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			活動列表
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="Activities-dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
                            <th>置頂</th>
                            <th>類型</th>
                            <th>編號</th>
							<th>標題</th>
							<th>創建日期</th>
							<th>最後更新日期</th>
							<th>最後更新人</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($activities as $activity)
							<tr>
                                <td class="text-center">
                                    @if ($activity->is_top)
                                        <i class="fas fa-star"></i>
                                    @endif
                                </td>
                                <td>{{ $activity->showType() }}</td>
                                <td>{{ $activity->id }}</td>
								<td>{{ $activity->title }}</td>
								<td>{{ $activity->created_at }}</td>
								<td>{{ $activity->updated_at }}</td>
								<td>{{ $activity->showUserName() }}</td>
								<td>
                                    @if (!$activity->is_top && $activity->type == 1)
                                        <a href="{{ route('activities.change_top', [$activity->id])}}" class="btn btn-md btn-warning">
                                            <i class="far fa-star"></i>
                                        </a>
                                    @endif

									<a href="{{ route('activities.show', [$activity->id]) }}" class="btn btn-md btn-info">
										<i class="fas fa-info-circle"></i>
									</a>
									<a href="{{ route('activities.edit', [$activity->id]) }}" class="btn btn-md btn-success">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a href="#" class="btn btn-md btn-danger" onclick="
										event.preventDefault();
										ans = confirm('確定要刪除此公告嗎?');
										if(ans){
											$('#deleteform-{{ $activity->id }}').submit();
										}
									">
										<i class="far fa-trash-alt"></i>
									</a>
									<form id="deleteform-{{ $activity->id }}" action="{{ route('activities.destroy', [$activity->id]) }}" method="POST" style="displat: none;">
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
