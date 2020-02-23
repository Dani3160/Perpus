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
    <style>
  .tab {
  overflow: hidden;
  border: 1px solid #309fe6;
  border-top: none;
  border-right: none;
  border-left: none;
  color: #309fe6;
  background-color: #fff;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    color: #309fe6;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    border-radius: 25px;
    background-image:linear-gradient(180deg,#4e73df 10%,#17c0eb 100%);
    color: #fff;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border-top: none;
  }
</style>

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