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
            <a href="{{ route('books.index') }}">{{ __('Books') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Index') }}</li>
    @endcomponent

	<div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('books.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增書本
			</a>
		</div>
    </div>
	
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			書本列表
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
                            <th>編號</th>
							<th>標題</th>
							<th>借閱次數</th>
							<th>狀態</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($books as $book)
							<tr>
                                <td>{{ $book->id }}</td>
								<td>{{ $book->title }}</td>
								<td>0</td>
								<td>{{ $book->showStatus() }}</td>
								<td>
									<a href="http://metadata.ncl.edu.tw/blstkmc/blstkm?00117C149BC1010200000000000100A000000001000000000^#tudorkmtop">jj</a>
									<a href="{{ route('books.show', [$book->id]) }}" class="btn btn-md btn-info">
										<i class="fas fa-info-circle"></i>
									</a>
									<a href="{{ route('books.edit', [$book->id]) }}" class="btn btn-md btn-success">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a href="#" class="btn btn-md btn-danger" onclick="
										event.preventDefault();
										ans = confirm('確定要刪除此書本嗎?');
										if(ans){
											$('#deleteform-{{ $book->id }}').submit();
										}
									">
										<i class="far fa-trash-alt"></i>
									</a>
									<form id="deleteform-{{ $book->id }}" action="{{ route('books.destroy', [$book->id]) }}" method="POST" style="displat: none;">
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
