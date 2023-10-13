<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="{{asset('theme/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body>

    <div id="wrapper">
        @include('common.sidebar')
        <div id="content-wrapper">
            <div id="content">
                @include('common.topbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


<script src="{{asset('theme/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('theme/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('theme/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('theme/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('theme/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('theme/js/demo/chart-pie-demo.js')}}"></script>

</body>
</html>