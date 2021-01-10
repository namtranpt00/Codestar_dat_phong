@extends('layouts.user')
@section('title', 'Danh sách yêu cầu')
@section('orders-open', 'menu-open')
@section('orders-active', 'active')

@section('rooms-open', 'menu-open')
@section('rooms-active', 'active')
@section('orders-list-active', 'active')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Yêu cầu của bạn</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>

                            <li class="breadcrumb-item active">Yêu cầu của bạn</li>
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
                            <form action="{{route('room.orderDetail')}}"  method="GET">
                                <div class="card-header">
                                    Tìm kiếm
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Từ ngày</label>
                                                <input class="form-control" id="fromDate" type="date"
                                                       value="{{request()->input('from_date')}}" name="from_date">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Đến ngày</label>
                                                <input class="form-control" type="date" id="endDate"
                                                       value="{{request()->input('to_date')}}" name="to_date">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Trạng thái</label>
                                                <select class="form-control" name="status">
                                                    <option
                                                        value="" @if (request()->input('status') == '') {{ 'selected' }} @endif>
                                                        Tất cả
                                                    </option>
                                                    <option
                                                        value="-1" @if (request()->input('status') == '-1') {{ 'selected' }} @endif>
                                                        Đang chờ
                                                    </option>
                                                    <option
                                                        value="1" @if (request()->input('status') == '1') {{ 'selected' }} @endif>
                                                        Phê duyệt
                                                    </option>
                                                    <option
                                                        value="0" @if (request()->input('status') == '0') {{ 'selected' }} @endif>
                                                        Từ chối
                                                    </option>
                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-6 col-md-2">
                                            <button type="submit" class="btn btn-sm btn-block btn-primary">Tìm kiếm
                                            </button>
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
                                Danh sách đặt phòng
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed ">
                                    <thead>
                                    <tr class="text-nowrap">
                                        <th class="text-center">STT</th>
                                        <th>Ngày đặt</th>
                                        <th>Ca đặt</th>
                                        <th class="">Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($stt = $orders->perPage() * ($orders->currentPage()-1))
                                    @foreach ($orders as $key => $order)
                                        <tr>
                                            <td class="text-center">{{$stt+$key+1}}</td>
                                            <td>{{ date('d/m/Y',strtotime($order->time_start))}}</td>
                                            <td>
                                                @if(date('H',strtotime($order->time_start)) < 12 )
                                                    Ca sáng
                                                @else
                                                    Ca chiều
                                                @endif
                                            </td>
                                            <td class="text-nowrap">
                                                @if($order->status==-1)
                                                    <btn class="btn btn-primary">Đang chờ</btn>
                                                @elseif($order->status==1)
                                                    <btn class="btn btn-success"> Phê duyệt</btn>
                                                @else
                                                    <btn class="btn btn-danger"> Từ chối</btn>
                                                @endif
                                            </td>
{{--                                            <td class="text-right">--}}
{{--                                                <a href="{{route('admin.orders.add',['order'=>$order->id])}}"--}}
{{--                                                   class="btn btn-sm btn-primary">Chi tiết</a>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer ">
                                <a href="{{$orders->nextPageUrl()}}" class="next float-right">Next &raquo;</a>
                                <a href="{{$orders->previousPageUrl()}}" class="previous mr-5 float-right">&laquo;
                                    Previous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

