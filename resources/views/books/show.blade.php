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
        <div class="col-md-10">

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

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="add_type">入庫方式</label>
                        <select id="add_type" name="add_type" class="form-control">
                            <option value="1" selected>捐贈入庫</option>
                            <option value="2">購買入庫</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="donor_id"><span id="donor_id_required_star" class="text-danger mr-2">*</span>捐贈人</label>
                        <select id="donor_id" name="donor_id" class="form-control">
                            <option value="0">請選擇...</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="price"><span id="price_required_star" class="text-danger mr-2" style="display:none;">*</span>價格</label>
                        <input id="price" name="price" type="text" class="form-control" value="0" autocomplete="off" disabled>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">狀態</label>
                        <select id="status" name="status" class="form-control" disabled>
                            <option value="4">庫藏待上架</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 text-center">
                    {{-- <upload-images ref="uploadBookImages" :uploadimg="uploadimg" :title="title"></upload-images> --}}
                </div>

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">
                                    <span class="text-danger mr-2">*</span>書名（主標題）
                                </label>
                                <input id="title" name="title" type="text" class="form-control" value="" required
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="subtitle">副標題</label>
                                <input id="subtitle" name="subtitle" type="text" class="form-control" value=""
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="author">作者</label>
                                <input id="author" name="author" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="position"">位置</label>
                                <input id="position"" name="position"" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="translator">譯者</label>
                                <input id="translator" name="translator" type="text" class="form-control" value=""
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="language">語言</label>
                                <input id="language" name="language" type="text" class="form-control" value=""
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="publisher">出版商</label>
                                <input id="publisher" name="publisher" type="text" class="form-control" value=""
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edition">版次</label>
                                <input id="edition" name="edition" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="published_date">出版日期</label>
                        <input id="published_date" name="published_date" type="text" class="form-control" value=""
                            autocomplete="off">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input id="isbn" name="isbn" type="text" class="form-control" value="" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="callnum">
                            <span class="text-danger mr-2">*</span>索書號
                        </label>
                        <input id="callnum" name="callnum" type="text" class="form-control" value="" autocomplete="off">
                        <span id="callnum_error" class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="category">圖書類別</label>
                        <select id="category" name="category" class="form-control" disabled>
                            {{-- <option v-for="option in category_options" :key="option.id" :value="option.id">{{ option.text }}
                            </option> --}}
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="3"></textarea>
                    </div>
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
