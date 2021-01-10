@extends('layouts.admin')
@section('title', 'Sửa yêu cầu')
@section('orders-open', 'menu-open')
@section('orders-active', 'active')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Chi tiết yêu cầu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý yêu cầu</a></li>
                            <li class="breadcrumb-item active">Chi tiết yêu cầu</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-secondary card-outline ">
                        <div class="card-header">
                            <h3 class="card-title">Yêu cầu</h3>
                        </div>
                        <form class="needs-validation" id="formOrder" role="form"
                              action="{{route('admin.orders.save',['order' => $order->id])}}" method="post">
                            @csrf
                            <input type="hidden" value="{{isset($order) ? $order->id: ""}}" name="id">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên phòng</label>
                                    <input class="form-control" type="text" value="{{$room->name}}"
                                           style="width: 100%" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Người đặt</label>
                                    <br>
                                    <input class="form-control" type="text" value="{{$user->name}}" disabled
                                           style="width: 100%">
                                </div>
                                <div class="form-group">
                                    <label>Chức vụ</label>
                                    <br>
                                    @if($user->roll==0)
                                    <input class="form-control" type="text" value="Sinh viên" disabled
                                           style="width: 100%">
                                    @else
                                        <input class="form-control" type="text" value="Giảng viên" disabled
                                               style="width: 100%">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Ngày đặt</label>
                                    <input required type="date"
                                           value="{{ date('Y-m-d', strtotime($order->time_start))}}"
                                           name="date" class="form-control" disabled>
                                </div>
                                <div class="form-group ">
                                    <label>Ca</label>
                                    <select class="form-control" name="time" disabled>
                                        <option
                                            {{date('H', strtotime($order->time_start)) == 6 ? 'selected' : ''}} value="0">
                                            Sáng
                                        </option>
                                        <option
                                            {{date('H', strtotime($order->time_start)) == 12 ? 'selected' : ''}} value="1">
                                            Chiều
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mục đích/ Lý do</label>
                                    <textarea type="text" name="note" class="form-control" disabled>{{$order->note}}
                                        </textarea>

                                </div>
                                <div class="form-group">
                                    <label>Trạng thái<span class="text-danger">*</span> </label>
                                    <select name="status" class="form-control" id="inputStatus">
                                        <option {{$order->status == -1 ? 'selected' : ''}} value="-1">Đang chờ
                                        </option>
                                        <option {{$order->status == 1 ? 'selected' : ''}} value="1">Phê duyệt
                                        </option>
                                        <option {{$order->status == 0 ? 'selected' : ''}} value="0">Từ chối
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row justify-content-end">
                                    <div class="col-sm-6 col-md-2">
                                        <button type="submit" class="btn btn-sm btn-block btn-primary">Lưu
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
