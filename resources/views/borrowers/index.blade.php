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
            <a href="{{ route('borrowers.index') }}">{{ __('Borrowers') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

	<div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('borrowers.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增借閱人
			</a>
		</div>
    </div>

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			借閱人列表
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
                            <th>編號</th>
							<th>名稱</th>
							<th>電話</th>
							<th>隸屬單位</th>
							<th>借閱數量</th>
							<th>逾期數量</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($borrowers as $borrower)
							<tr>
                                <td>{{ $borrower->id }}</td>
								<td>{{ $borrower->name }}</td>
								<td>{{ $borrower->tel }}</td>
								<td>{{ $borrower->showAgencyName() }}</td>
								<td>0</td>
								<td>0</td>
								<td>
									<a href="{{ route('borrowers.show', [$borrower->id]) }}" class="btn btn-md btn-info">
										<i class="fas fa-info-circle"></i>
									</a>
									<a href="{{ route('borrowers.edit', [$borrower->id]) }}" class="btn btn-md btn-success">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a href="#" class="btn btn-md btn-danger" onclick="
										event.preventDefault();
										ans = confirm('確定要刪除此借閱人嗎?');
										if(ans){
											$('#deleteform-{{ $borrower->id }}').submit();
										}
									">
										<i class="far fa-trash-alt"></i>
									</a>
									<form id="deleteform-{{ $borrower->id }}" action="{{ route('borrowers.destroy', [$borrower->id]) }}" method="POST" style="displat: none;">
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
