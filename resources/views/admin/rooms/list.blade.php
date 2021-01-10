@extends('layouts.admin')
@section('title', 'Danh sách phòng')
@section('rooms-open', 'menu-open')
@section('rooms-active', 'active')
@section('rooms-list-active', 'active')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách phòng </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý phòng </a></li>
                            <li class="breadcrumb-item active">Danh sách phòng </li>
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
                            <form action="{{route('admin.rooms.list')}}" method="GET">
                                <div class="card-header">
                                    Tìm kiếm
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Tên phòng</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       value="{{ request()->input('name') }}"
                                                       placeholder="Nhập tên ">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Loại phòng</label>
                                                <input type="text" class="form-control" id="type" name="type"
                                                       value="{{ request()->input('type') }}"
                                                       placeholder="Nhập loại phòng">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="number_of_seats">Số lượng ghế</label>
                                                <input type="number" class="form-control" id="number_of_seats"
                                                       name="number_of_seats"
                                                       value="{{ request()->input('number_of_seats') }}"
                                                       min="0"
                                                       placeholder="Nhập số lượng ghế">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="address">Địa chỉ</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                       value="{{ request()->input('address') }}"
                                                       placeholder="Nhập địa chỉ">
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
                                        <div class="col-sm-6 col-md-2">
                                            <a href="{{route('admin.rooms.add')}}"
                                               class="btn btn-sm btn-block btn-success">Thêm mới</a>
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
                                Danh sách phòng
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed ">
                                    <thead>
                                    <tr class="text-nowrap">
                                        <th class="text-center">STT</th>
                                        <th>Tên phòng</th>
                                        <th>Loại phòng</th>
                                        <th class="text-center">Số lượng ghế</th>
                                        <th>Địa chỉ</th>
                                        <th class="text-center">Hình ảnh</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($stt = $rooms->perPage() * ($rooms->currentPage()-1))
                                    @foreach ($rooms as $key => $room)
                                        <tr>
                                            <td class="text-center">{{$stt + $key + 1}}</td>
                                            <td>{{ $room->name }}</td>
                                            <td>{{ $room->type }}</td>
                                            <td class="text-center">{{ $room->number_of_seats }}</td>
                                            <td>{{ $room->address }}</td>
                                            <td>
                                                @if($room->images != '[]')
                                                    <img src="{{ asset('img/' . $room->images )}} "
                                                         class="d-block img-fluid" style="width: 7rem; height: 7rem">
                                                @else
                                                    <img src="{{ asset('img/no_image.png' )}} "
                                                         class="d-block img-fluid" style="width: 7rem; height: 7rem">
                                                @endif
                                            </td>
                                            <td class="text-right text-nowrap">
                                                <a href="{{route('admin.rooms.edit', ['room'=>$room->id])}}"
                                                   class="btn btn-sm btn-primary">Sửa</a>
                                                <a href="{{route('admin.rooms.delete', ['room'=>$room->id])}}"
                                                   data-message="Bạn có muốn xóa phòng họp {{$room->name}}  không?"
                                                   class="btn btn-sm btn-danger delete">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer ">
                                <a href="{{$rooms->nextPageUrl()}}" class="next float-right">Next &raquo;</a>
                                <a href="{{$rooms->previousPageUrl()}}" class="previous mr-5 float-right">&laquo; Previous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

