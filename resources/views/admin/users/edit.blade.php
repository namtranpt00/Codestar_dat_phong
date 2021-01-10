@extends('layouts.admin')
@section('title', 'Thêm mới người dùng')
@section('users-open', 'menu-open')
@section('users-active', 'active')
@section('users-add-active', 'active')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Cập nhật người dùng</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý người dùng</a></li>
                            <li class="breadcrumb-item active">Cập nhật người dùng</li>
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

                            <form action="{{route('admin.users.update',['user'=>$user->id])}}" method="POST">
                                <div class="card-header">
                                    Nhập thông tin người dùng
                                </div>
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Họ tên <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               value="{{ $user->name }}" required autocomplete="off"
                                               placeholder="Nhập tên người dùng">
                                        @error('name')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Chức vụ</label>
                                        <select class="form-control" name="roll">
                                            @if( $user->roll==0)
                                                <option selected
                                                        value="0">
                                                    Sinh viên
                                                </option>
                                                <option
                                                    value="1">
                                                    Giảng viên
                                                </option>
                                            @else
                                                <option
                                                    value="0">
                                                    Sinh viên
                                                </option>
                                                <option selected
                                                        value="1">
                                                    Giảng viên
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ $user->email }}" required autocomplete="off"
                                               placeholder="Nhập email người dùng">
                                        @error('email')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu <span class="text-danger">*</span></label>
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"

                                               placeholder="Nhập mật khẩu" >
                                        @error('password')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                               placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group form-check">
                                                <input type="checkbox" id="is_admin" class="form-check-input" value="1"
                                                       name="is_admin"
                                                       @if  ( $user->is_admin == 1) checked @endif/>
                                                <label for="is_admin">Quản trị viên</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-6 col-md-2">
                                            <button class=" btn btn-primary float-right" type="submit">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
