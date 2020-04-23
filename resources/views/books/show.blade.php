@extends('layouts.backend.master')

@push('CustomJS')
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Books Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('books.index') }}">{{ __('Books') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Show') }}</li>
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-12 text-center">
                    網銀基金會 / 拾本書堂
                </div>
            </div>
            <div class="row">
                <div class="col-md-12  text-center">
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($book->barcode, 'C128') }}" alt="barcode"   />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    {{ $book->barcode }}
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('books.edit', [$book->id]) }}" class="btn btn-block btn-success">
                        編輯修改
                    </a>
                    <a href="{{ route('books.index') }}" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
