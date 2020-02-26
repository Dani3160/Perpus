@extends('layouts.operator.master')

@section('judul')
Dashboard Operator
@stop

@section('konten')
    <!-- Card -->

    <div class="row mt-5">
        <div class="col-md-12">
            <h4 class="text-dark">Selamat <script src="{{asset('js/sapa.js')}}"></script>{{Auth::user()->name}}!</h4>
        </div>
    </div>

    <div class="row mt-3">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengguna Aplikasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$anggota}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$biblio}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Buku Hilang</div>
                            
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">15</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Buku Dipinjam</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$bukupinjam}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman Buku Per Bulan</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
                </div>
            </div>
            </div>

            <!-- Bar Chart -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Aplikasi Per Bulan</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                <canvas id="myBarChart"></canvas>
                </div>
            </div>
            </div>

        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                <canvas id="myPieChart"></canvas>
                </div>
            </div>
            </div>
        </div>

    </div>

    <!-- End Card -->
@stop 
@push('scripts')
  <!-- Chart -->
  <script src="{{asset('operator/vendor/chart.js/Chart.min.js')}}"></script>

  <script src="{{asset('operator/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('operator/js/demo/chart-pie-demo.js')}}"></script>
  <script src="{{asset('operator/js/demo/chart-bar-demo.js')}}"></script>
@endpush