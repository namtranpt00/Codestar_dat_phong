@extends('layouts.user')
@section('title', 'Đặt lịch phòng họp')
@section('rooms-open', 'menu-open')
@section('rooms-active', 'active')
@section('rooms-list-active', 'active')

@section('content')
    <div class="content-wrapper " >
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách phòng </h1>
                    </div><!-- /.col -->

                </div>
            </div>
        </div>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-secondary card-outline">
                            <form action="{{route('room.booking')}}" method="GET">
                                <div class="card-header">
                                    Tìm kiếm
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Chọn phòng</label>
                                                <input class="form-control" type="text" name="name"
                                                       value="{{ request()->input('name') }}"
                                                       placeholder="Tên phòng">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Số lượng ghế</label>
                                                <input class="form-control" type="number" name="number_of_seats"
                                                       value="{{ request()->input('number_of_seats') }}"
                                                       placeholder="Số lượng ghế"
                                                       min="0">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Loại phòng</label>
                                                <input class="form-control" type="text" name="type"
                                                       value="{{ request()->input('type') }}"
                                                       placeholder="Loại phòng">
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
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header ">
                                Danh sách phòng
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed ">
                                    <thead class="thead-light">
                                    <tr class="text-nowrap">
                                        <th class="text-center">STT</th>
                                        <th>Tên phòng</th>
                                        <th>Loại phòng</th>
                                        <th class="text-center">Số lượng ghế</th>

                                        <th>Địa chỉ</th>
                                        <th class="text-nowrap">Ảnh</th>
                                        <th class="text-nowrap"></th>
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
                                            <td><a href="{{ route('room.detail',['room'=>$room->id]) }}"
                                                   class="btn btn-sm btn-success">Xem</a></td>
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
