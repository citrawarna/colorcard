<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - CWA Color Cards</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css')}}">
    <!-- datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="icon" href="{{ asset('dist/img/AdminLTELogo.png')}}">
</head>

@guest
<body style="background-color: #f2f2f2">
    <div class="wrapper" >
        @yield('content')
    </div>
@else 

<body class="hold-transition sidebar-mini">
    <div class="wrapper" >
        <!-- NAVBAR -->
        @include('layouts.navbar')
        <!-- SIDEBAR -->
        @include('layouts.sidebar')
        <!-- HEADER CONTENT -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-mb-2">
                        <div class="col-md-6">
                            <h1>@yield('title')</h1>
                        </div>
                    </div>
                    <br>
                    @include('layouts.flash')
                    
                </div>
            </section>
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')

@endguest

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <!-- jQuery -->
    <script src=" {{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function(){
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
        changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
        $( "#datepickers" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
        changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
        });
    </script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- cleave js -->
    <script src="{{ asset('cleave-js/dist/cleave.min.js') }}"></script>
    <!-- CHECKBOX -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

    <script>
    $(function () {
        $("#myTable").DataTable();
    });
   
    </script>

    @stack('scripts')
          
</body>
</html>
