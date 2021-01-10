@extends('layouts.admin')
@section('title', 'Thêm mới phòng họp')
@section('rooms-open', 'menu-open')
@section('rooms-active', 'active')
@section('rooms-add-active', 'active')
{{--@section('styles')--}}
{{--    <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">--}}
{{--    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">--}}
{{--    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">--}}
{{--@endsection--}}
@section('scripts')
    <script>
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm mới phòng họp</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý phòng họp</a></li>
                            <li class="breadcrumb-item active">Thêm mới phòng họp</li>
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
                            <form action="{{route('admin.rooms.save')}}" method="POST" enctype="multipart/form-data">
                                <div class="card-header">
                                    Nhập thông tin phòng họp mới
                                </div>
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Tên phòng họp <span class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name"
                                                       value="{{ old('name') }}" required autocomplete="off"
                                                       placeholder="Nhập tên phòng họp">
                                                @error('name')
                                                <span class="invalid-feedback"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Loại phòng <span class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @error('type') is-invalid @enderror"
                                                       name="type"
                                                       value="{{ old('type') }}" required autocomplete="off"
                                                       placeholder="Nhập loại phòng họp">
                                                @error('type')
                                                <span class="invalid-feedback"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Số lượng ghế <span class="text-danger">*</span></label>
                                                <input type="number" min="0"
                                                       class="form-control @error('number_of_seats') is-invalid @enderror"
                                                       name="number_of_seats"
                                                       value="{{ old('number_of_seats') }}" required autocomplete="off"
                                                       placeholder="Nhập số lượng ghế phòng họp">
                                                @error('number_of_seats')
                                                <span class="invalid-feedback"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ<span class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @error('address') is-invalid @enderror"
                                                       name="address"
                                                       value="{{ old('address') }}" required autocomplete="off"
                                                       placeholder="Nhập địa chỉ phòng họp">
                                                @error('address')
                                                <span class="invalid-feedback"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Dịch vụ</label>
                                                <select class="form-control" name="services[]" id="inputServices"
                                                        multiple
                                                        data-placeholder="Chọn dịch vụ">
                                                    @foreach($services as $service)
                                                        @if($service->status==1)
                                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <table class="table table-striped" id="tableServices"></table>
                                        </div>
                                        <div class="col-md-6 col-12 card mt-4 ">
                                            <div class="form-group mt-3">
                                                <p>Hình ảnh:</p>
                                                <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" id="imgInp"
                                                           name="image">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                    <img class="mt-3" id="blah" src="#" />
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-6 col-md-2">
                                            <button class=" btn btn-primary float-right" type="submit">Thêm mới</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="imagesInput">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
