<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smaknis | @yield('judul')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('operator/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('operator/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Datatables -->
  <link href="{{asset('operator/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <!-- Jquery UI -->
  <link href="{{asset('operator/css/jquery-ui.min.css')}}" rel="stylesheet">
  <style>
  .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  border-top: none;
  border-right: none;
  border-left: none;
  background-color: #F6F7FA;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
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
    background-color: #2f56c8;
    color: #fff;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border-top: none;
  }
</style>
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{asset('image/logo/logo.png')}}" alt="" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">nurisperpus</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('operator.dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Master
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Biblio</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Biblio Master</h6>
            <!-- <a class="collapse-item" href="">Tambah Biblio</a> -->
            <a class="collapse-item" href="{{route('operator.biblio')}}">Data Biblio</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Pengaturan Sirkulasi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Sirkulasi:</h6>
            <a class="collapse-item" href="">Peminjaman</a>
            <a class="collapse-item" href="">Pengembalian</a>
            <a class="collapse-item" href="">Riwayat</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Keanggotaan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pengaturan Anggota</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Anggota:</h6>
            <a class="collapse-item" href="">Tambah Anggota</a>
            <a class="collapse-item" href="">List Anggota</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Lainnya:</h6>
            <a class="collapse-item" href="404.html">Daftar Pendukung</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        @include('layouts/operator/partials/header')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('konten')
            </div>
      </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Design By | IT SMAKNIS TEAM 2020</span>
                </div>
                </div>
            </footer>
            <!-- End of Footer -->
    </div>

    
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('operator/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('operator/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
  <!-- Core plugin JavaScript-->
  <script src="{{asset('operator/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('operator/js/sb-admin-2.min.js')}}"></script>

  <!-- Datatables -->
  <script src="{{asset('operator/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('operator/datatables/dataTables.bootstrap4.js')}}"></script>

  
  <!-- Jquery UI -->
  <script src="{{asset('operator/js/jquery-ui.min.js')}}"></script>

  @stack('scripts')
</body>
</html>