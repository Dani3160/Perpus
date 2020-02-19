<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuris Perpus | @yield('judul')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome -->
    <link href="{{asset('operator/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('user/css/bootstrap.css')}}">
	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> -->
    <link href="{{asset('operator/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body>

    @include('layouts/user/partials/header')

    <div class="container mt-4">
        @yield('konten')
    </div>


    <script src="{{asset('user/js/jquery.js')}}"></script>
	<script src="{{asset('user/js/bootstrap.js')}}"></script>
    <script src="{{asset('operator/js/sb-admin-2.min.js')}}"></script>
    @stack('scripts')
</body>
</html>