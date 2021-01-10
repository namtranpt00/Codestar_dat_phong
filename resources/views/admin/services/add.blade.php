@extends('layouts.admin')
@section('title', 'Thêm mới dịch vụ')
@section('services-open', 'menu-open')
@section('services-active', 'active')
@section('services-add-active', 'active')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm mới dịch vụ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý dịch vụ</a></li>
                            <li class="breadcrumb-item active">Thêm mới dịch vụ</li>
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
                            <form action="{{route('admin.services.save')}}" method="POST">
                                @csrf
                                <div class="card-header">
                                    Nhập thông tin dịch vụ mới
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên dịch vụ <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') }}"
                                               placeholder="Nhập tên dịch vụ">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Loại dịch vụ <span class="text-danger">*</span></label>
                                        <select name="type" class="form-control">
                                            <option value="BOOLEAN" @if(old('type') == 'BOOLEAN') selected @endif>Có/Không</option>
{{--                                            <option VALUE="INTEGER" @if(old('type') == 'INTEGER') selected @endif>Số lượng</option>--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-6 col-md-2">
                                            <button class=" btn btn-primary float-right" type="submit">Thêm mới</button>
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
