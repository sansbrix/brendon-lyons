<html lang="en" class="perfect-scrollbar-off"><head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{asset('dist/css/paper-dashboard.css')}}" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('dist/demo/demo.css')}}" rel="stylesheet">
  <style type="text/css">/* Chart.js */
  @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/49/8/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/49/8/util.js"></script></head>

  <body class="">
    <div class="wrapper ">
       @include('layouts.sidebar')
      <div class="main-panel">
        <!-- Navbar -->
        @include('layouts.header')
        <!-- End Navbar -->
        <div class="content" style="height: 100vh">
            @yield('content')
        </div>
        @include('layouts.footer')
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('dist/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('dist/js/core/popper.min.js')}}"></script>
    <script src="{{asset('dist/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{asset('dist/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('dist/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('dist/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('dist/demo/demo.js')}}"></script>
    <script src="{{ asset('main.js')}}"></script>
    <script src="{{ asset('swal/swal.min.js')}}"></script>
    @foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
        @if(Session::has($msg))
        <script>
            swal({
                text: '{{ Session::get($msg) }}',
                icon : '{{$msg}}',
            });
        </script>
        @endif
    @endforeach

  </body></html>
