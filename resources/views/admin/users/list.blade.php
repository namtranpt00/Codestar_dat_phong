@extends('layouts.admin')
@section('title', 'Danh sách người dùng')
@section('users-open', 'menu-open')
@section('users-active', 'active')
@section('users-list-active', 'active')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách người dùng</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý người dùng</a></li>
                            <li class="breadcrumb-item active">Danh sách người dùng</li>
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
                            <form action="{{route('admin.users.list')}}" method="GET">
                                @csrf
                                <div class="card-header">
                                    Tìm kiếm
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Tên, email </label>
                                                <input type="text" class="form-control"  name="name"
                                                       value="{{ request()->input('name') }}"
                                                       placeholder="Nhập tên hoặc email">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Loại tài khoản</label>
                                                <select class="form-control" name="is_admin">
                                                    <option
                                                        value="" @if (request()->input('is_admin') == '') {{ 'selected' }} @endif>
                                                        Tất cả
                                                    </option>
                                                    <option
                                                        value="0" @if (request()->input('is_admin') == '0') {{ 'selected' }} @endif>
                                                        Người dùng
                                                    </option>
                                                    <option
                                                        value="1" @if (request()->input('is_admin') == '1') {{ 'selected' }} @endif>
                                                        Quản trị viên
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Chức vụ</label>
                                                <select class="form-control" name="roll">
                                                    <option
                                                        value="" @if (request()->input('roll') == '') {{ 'selected' }} @endif>
                                                        Tất cả
                                                    </option>
                                                    <option
                                                        value="0" @if (request()->input('roll') == '0') {{ 'selected' }} @endif>
                                                       Sinh viên
                                                    </option>
                                                    <option
                                                        value="1" @if (request()->input('roll') == '1') {{ 'selected' }} @endif>
                                                        Giảng viên
                                                    </option>
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
                                            <a href="{{route('admin.users.add')}}" class="btn btn-sm btn-block btn-success">Thêm mới</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Danh sách người dùng
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed ">
                                    <thead>
                                    <tr class="text-nowrap">
                                        <th class="text-center">STT</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Chức vụ</th>
                                        <th>Loại tài khoản</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($stt = $users->perPage() * ($users->currentPage()-1))
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td class="text-center">{{$stt + $key + 1}}</td>
                                            <td>{{ $user->name }}</td>

                                            <td>{{ $user->email }}</td>
                                            <td>@if ($user->roll == 1)
                                                    Giảng viên
                                                @else
                                                    Sinh viên
                                                @endif</td>
                                            <td>
                                                @if ($user->is_admin == 1)
                                                    Quản trị viên
                                                @else
                                                    Người dùng
                                                @endif
                                            </td>
                                            <td class="text-right text-nowrap">
                                                <a href="{{route('admin.users.edit',['user'=>$user->id])}}" class="btn btn-sm btn-primary">Sửa</a>
                                                <a href="{{route('admin.users.delete',['user'=>$user->id])}}" data-message="Bạn có muốn xóa người dùng {{$user->name}} - {{$user->email}} không?" class="btn btn-sm btn-danger delete">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer ">
                                <a href="{{$users->nextPageUrl()}}" class="next float-right">Next &raquo;</a>
                                <a href="{{$users->previousPageUrl()}}" class="previous mr-5 float-right">&laquo; Previous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

