@extends('layouts.backend.master')

@push('CustomJS')
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
	<script src="{{ asset('js/users/index.js') }}" defer></script>
@endpush

@section('content')

	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('People Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('users.index') }}">{{ __('Admins') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Index') }}</li>
	@endcomponent

    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('users.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增帳號(後臺註冊)
			</a>
		</div>
    </div>

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item" id="nav_actived">
                    <a class="nav-link active" id="a_actived" href="#"><i class="fas fa-table mr-2" id="i_actived"></i>員工名單</a>
                </li>
                <li class="nav-item" id="nav_block">
                    <a class="nav-link" href="#" id="a_block"><i class="fas fa-user-slash mr-2" id="i_block" style="display:none;"></i>停權員工名單</a>
                </li>
            </ul>
		</div>
		<div class="card-body">
            {{-- 一般使用者 --}}
            <div id="div_act">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>序號</th>
                                <th>姓名</th>
                                <th>帳號</th>
                                <th>電話</th>
                                <th>類型</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                                <tr class="">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->account }}</td>
                                    <td>{{ $user->tel ?? '無' }}</td>
                                    <td>{{ $user->showStatus() }}</td>
                                    <td>
                                        <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-md btn-info">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        @if(auth('api')->id() == 1 || auth('api')->id() == $user->id)
                                            <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-md btn-success">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        @endif
                                        @if($user->id != 1 && $user->id != auth('api')->id())
                                                <a href="#" class="btn btn-md btn-danger" onclick="
                                                    event.preventDefault();
                                                    
                                                    Swal.fire({
                                                        title: '注意！',
                                                        text: '您確定要停權此帳號嗎？',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: '確認',
                                                        cancelButtonText: '取消',
                                                    }).then((result) => {
                                                        if (result.value) {
                                                            $('#deleteform-{{ $user->id }}').submit();
                                                        }
                                                    });
                                                ">
                                                    <i class="fas fa-user-slash"></i>
                                                    停權
                                                </a>
                                            <form id="deleteform-{{ $user->id }}" action="{{ route('users.destroy', [$user->id]) }}" method="POST" style="displat: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- 停權名單 --}}
            <div id="div_block" style="display: none">
                @if ($users_block->count() == 0)
                           目前無資料
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>序號</th>
                                    <th>姓名</th>
                                    <th>帳號</th>
                                    <th>電話</th>
                                    <th>類型</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users_block as $key => $user)
                                    <tr class="">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->account }}</td>
                                        <td>{{ $user->tel ?? '無' }}</td>
                                        <td>{{ $user->showStatus() }}</td>
                                        <td>
                                            <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-md btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            @if(auth('api')->id() == 1 || auth('api')->id() == $user->id)
                                                <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-md btn-success">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            @endif
                                            @if($user->id != 1 && $user->id != auth('api')->id())
                                                @if($user->trashed())
                                                    <a href="#" class="btn btn-md btn-light" onclick="
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: '注意！',
                                                            text: '您確定要解鎖此帳號嗎？',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: '確認',
                                                            cancelButtonText: '取消',
                                                        }).then((result) => {
                                                            if (result.value) {
                                                                $('#deleteform-{{ $user->id }}').submit();
                                                            }
                                                        });
                                                    ">
                                                        <i class="fas fa-unlock"></i>
                                                        解鎖
                                                    </a>
                                                    <a href="#" class="btn btn-md btn-danger" onclick="
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: '注意！',
                                                            text: '您確定要移除此帳號嗎？(不可再復原！)',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: '確認',
                                                            cancelButtonText: '取消',
                                                        }).then((result) => {
                                                            if (result.value) {
                                                                $('#forcedeleteform-{{ $user->id }}').submit();
                                                            }
                                                        });
                                                    ">
                                                        <i class="fas fa-trash-alt"></i>
                                                        移除
                                                    </a>
                                                @endif

                                                <form id="deleteform-{{ $user->id }}" action="{{ route('users.destroy', [$user->id]) }}" method="POST" style="displat: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <form id="forcedeleteform-{{ $user->id }}" action="{{ route('users.forceDestroy', [$user->id]) }}" method="POST" style="displat: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>

		</div>
	</div>

@endsection
