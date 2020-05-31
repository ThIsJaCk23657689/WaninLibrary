@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('General Settings') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('recommendation.index') }}">{{ __('Recommend') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Show') }}</li>
    @endcomponent
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('recommendation.edit') }}" class="btn btn-md btn-primary">
                <i class="fas fa-pencil-alt"></i>
                編輯好書推薦
			</a>
		</div>
    </div>

    <div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
            {{ $recommendation_title }}
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>編號</th>
							<th>書名</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->is_recommended }}</td>
                                <td>{{ $book->showTitle }}</td>
                                <td>{!!$book->action !!}</td>
                            </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection
