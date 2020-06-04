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

                @if ($book->donor_id != null)
                {{-- 捐贈書籍 --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="add_type">入庫方式</label>
                            <input id="add_type" name="add_type" type="text" class="form-control" value="捐贈入庫" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="donor_name">捐贈人</label>
                            <input id="donor_name" name="donor_name" type="text" class="form-control" value="{{ $book->donor->name }}"  readonly>
                        </div>
                    </div>

                @else
                {{-- 採購書籍 --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="add_type">入庫方式</label>
                            <input id="add_type" name="add_type" type="text" class="form-control" value="採購入庫" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price"">價格</label>
                            <input id="price"" name="price"" type="text" class="form-control" value="{{ $book->price }}"  readonly>
                        </div>
                    </div>
                @endif

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">狀態</label>
                        <input id="status"" name="status"" type="text" class="form-control" value="{{ $book->showStatus() }}"  readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 text-center">
                    {{-- <upload-images ref="uploadBookImages" :uploadimg="uploadimg" :title="title"></upload-images> --}}
                <img src="{{ asset($book->showCoverImage() ) }}" alt="封面圖片" class="img-fluid">
                </div>

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">
                                    書名（主標題）
                                </label>
                                <input id="title" name="title" type="text" class="form-control" value="{{ $book->title }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="subtitle">副標題</label>
                                <input id="subtitle" name="subtitle" type="text" class="form-control" value="{{ $book->subtitle }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="author">作者</label>
                                <input id="author" name="author" type="text" class="form-control" value="{{ $book->author }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="position"">位置</label>
                                <input id="position"" name="position"" type="text" class="form-control" value="{{ $book->position }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="translator">譯者</label>
                                <input id="translator" name="translator" type="text" class="form-control" value="{{ $book->translator }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="language">語言</label>
                                <input id="language" name="language" type="text" class="form-control" value="{{ $book->language }}"
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="publisher">出版商</label>
                                <input id="publisher" name="publisher" type="text" class="form-control" value="{{ $book->publisher }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edition">版次</label>
                                <input id="edition" name="edition" type="text" class="form-control" value="{{ $book->edition }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($book->category < 11 || $book->category == 13)
            {{-- 一般圖書 或 非中文圖書--}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="published_date">出版日期</label>
                            <input id="published_date" name="published_date" type="text" class="form-control" value="{{ $book->published_date }}"
                                readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input id="isbn" name="isbn" type="text" class="form-control" value="{{ $book->isbn }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="callnum">
                                索書號
                            </label>
                            <input id="callnum" name="callnum" type="text" class="form-control" value="{{ $book->callnum }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category">圖書類別</label>
                            <input id="category" name="category" type="text" class="form-control" value="{{ $book->showCategory() }}" readonly>
                        </div>
                    </div>
                </div>
            @else
            {{-- 期刊雜誌論文 --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="published_date">出版日期</label>
                            <input id="published_date" name="published_date" type="text" class="form-control" value="{{ $book->published_date }}"
                                readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">圖書類別</label>
                            <input id="category" name="category" type="text" class="form-control" value="{{ $book->showCategory() }}" readonly>
                        </div>
                    </div>
                </div>
            @endif


            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="3" readonly>{{ $book->content }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
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
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <a href="{{ route('books.create') }}" class="btn btn-block btn-primary">
                        新增書本
                    </a>
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
