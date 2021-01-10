<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | {{config('app.name')}}</title>
    <base href="{{config('app.url')}}" target="_top">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset("plugins/fontawesome-free/css/all.min.css") }} ">
    <link rel="stylesheet" href="{{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
</head>
<body class="layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper1">
    @include("layouts.user.header")
    @include('layouts.user.sidebar')
    @yield('content')
    @include("layouts.user.footer")
</div>

<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<script src="{{asset("dist/js/adminlte.js")}}"></script>
@yield('scripts')
<script>
    @if (Session::has('alert_success'))
    Swal.fire(
        'Thành công!',
        '{{Session::get('alert_success')}}',
        'success'
    );

    @endif
</script>
</body>
</html>


