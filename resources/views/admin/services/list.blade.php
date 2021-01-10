@extends('layouts.admin')
@section('title', 'Danh sách dịch vụ')
@section('services-open', 'menu-open')
@section('services-active', 'active')
@section('services-list-active', 'active')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách dịch vụ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý dịch vụ</a></li>
                            <li class="breadcrumb-item active">Danh sách dịch vụ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-secondary card-outline">
                            <form action="{{route('admin.services.list')}}" method="GET">
                                <div class="card-header">
                                    Tìm kiếm
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Tên</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       value="{{ request()->input('name') }}"
                                                       placeholder="Nhập tên ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="type">Loại dịch vụ</label>
                                                <select name="type" class="form-control">
                                                    <option value="">Tất cả</option>
                                                    <option value="BOOLEAN" @if(request()->input('type') == 'BOOLEAN') selected @endif>Có/Không</option>
                                                    <option value="INTEGER" @if(request()->input('type') == 'INTEGER') selected @endif>Số lượng</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-6 col-md-2">
                                            <button type="submit" class="btn btn-sm btn-block btn-primary">Tìm kiếm</button>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                            <a href="{{route('admin.services.add')}}" class="btn btn-sm btn-block btn-success">Thêm mới</a>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Danh sách dịch vụ
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed ">
                                    <thead>
                                    <tr class="text-nowrap">
                                        <th class="text-center">STT</th>
                                        <th>Tên</th>
                                        <th>Loại dịch vụ</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($stt = $services->perPage() * ($services->currentPage()-1))
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <td class="text-center">{{$stt + $key + 1}}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->type == 'BOOLEAN'?'Có/Không':'Số lượng' }}</td>
                                            <td class="text-right">
                                                <a href="{{route('admin.services.edit', ['service'=>$service->id])}}" class="btn btn-sm btn-primary">Sửa</a>
                                                <a href="{{route('admin.services.delete', ['service'=>$service->id])}}" data-message="Bạn có muốn xóa dịch vụ {{$service->name}} không?" class="btn btn-sm btn-danger delete">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer ">
                                <a href="{{$services->nextPageUrl()}}" class="next float-right">Next &raquo;</a>
                                <a href="{{$services->previousPageUrl()}}" class="previous mr-5 float-right">&laquo; Previous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

