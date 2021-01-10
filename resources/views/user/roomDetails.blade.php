@extends('layouts.user')
@section('title', 'Đặt lịch phòng họp')
@section('content')
    <div class="content-wrapper" >
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Đặt phòng</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-secondary card-outline">
                            <form action="{{route('booking.save',['room'=>$room->id])}}" method="POST">
                                @csrf
                                <div class="card-body table-responsive p-0">
                                    <div class="d-flex flex-row">
                                        <div class="card col-md-6 mt-4 ml-5">
                                            <div class="card-header"><b>Thông tin phòng </b></div>
                                            <div class="card-body">
                                                <table class="table table-head-fixed text-wrap">
                                                    <tbody>
                                                    <tr>
                                                        <th>Tên phòng:</th>
                                                        <td>{{ $room->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Loại phòng:</th>
                                                        <td>{{ $room->type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Số ghế:</th>
                                                        <td>{{ $room->number_of_seats }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Địa chỉ:</th>
                                                        <td>{{ $room->address }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 mt-4 ml-5">
                                            <div class="card-header"><b>Ảnh </b></div>
                                            <div class="card-body">
                                                @if($room->images != '[]')
                                                    <img src="{{ asset('img/' . $room->images )}} "
                                                         class="d-block img-fluid" style=" height: 15rem">
                                                @else
                                                    <img src="{{ asset('img/no_image.png' )}} "
                                                         class="d-block img-fluid">
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="card col-md-6 mt-4 ml-5">
                                            <label class="card-header ">
                                                <span class="ml-3">Thiết bị</span>
                                            </label>
                                            <div class="card-body ">
                                                <table class="table table-head-fixed text-wrap">
                                                    <tbody>
                                                    @foreach ($services as $service)
                                                        <tr>
                                                            <th>{{$service->name}}</th>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <label class="form-label">Ngày đặt<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date"
                                                           min="{{date("Y-m-d")}}"
                                                           name="date" required/>
                                                </div>
                                                <div class="form-group ">
                                                    <label>Ca</label>
                                                    <select class="form-control" name="time">
                                                        <option value="0">Sáng</option>
                                                        <option value="1">Chiều</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card card-body form-group ml-5 mr-5 mt-4">
                                            <label class="ml-5">Mục đích/ lý do.</label>
                                            <textarea class="form-control" rows="3" name="note" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-6 col-md-2">
                                            <a id="cancelButton" href="{{route('room.booking')}}"
                                               class="btn btn-sm btn-block btn-danger "> Hủy</a>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                            <button type="submit" class="btn btn-sm btn-block btn-primary">Đặt phòng
                                            </button>
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

