<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Resi | UrShip</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{ route('cek-ongkir') }}" class="navbar-brand">
                    <i class="fa fa-truck text-gray"></i>
                    <span class="brand-text font-weight-bold text-gray">UrShip</span>
                </a>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav d-md-none">
                        <li class="nav-item">
                            <a href="{{ route('cek-ongkir') }}" class="nav-link text-center">Ongkos Kirim</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cek-resi') }}" class="nav-link text-center">Lacak Paket</a>
                        </li>
                    </ul>
                </div>


                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-3 d-none d-lg-block" id="navbarCollapse">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('cek-ongkir') }}" class="nav-link">Ongkos Kirim</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cek-resi') }}" class="nav-link">Lacak Paket</a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-10 ml-auto mr-auto">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0"> Cek Resi </h1>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-10  mx-auto">
                            <div class="card card-default">
                                <form action="{{ route('cek-resi') }}" method="get">
                                    @csrf
    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nomor Resi</label>
                                                    <input type="text" class="form-control" name="waybill" value="{{ request('waybill') }}"
                                                        placeholder="Masukkan nomor resi">
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kurir</label>
                                                    <select class="form-control select2bs4" name="courier"
                                                        style="width: 100%;">
                                                        <option selected="selected" disabled>-- Pilih Kurir --</option>
                                                        @foreach($listCourier as $item)
                                                        <option value="{{ $item }}" >{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 mx-auto">
                            <div class="card card-default">
                                <div class="card-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No Resi</th>
                                                <th>Layanan</th>
                                                <th>Tujuan</th>
                                                <th>Penerima</th>
                                                <th>Tanggal Diterima</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>{{ $summary['waybill_number'] }}</td>
                                                <td>{{ $summary['service_code'] }}</td>
                                                <td>{{ $summary['destination'] }}</td>
                                                <td>{{ $summary['receiver_name'] }}</td>
                                                <td>{{ $summary['waybill_date'] }}</td>
                                                <td>{{ $summary['status'] }}</td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="5">
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        // select2
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })

        // select depedencies
        $(document).ready(function () {
            $('select[name="province_origin"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="origin"]').append();
                            $.each(data, function (key, value) {
                                $('select[name="origin"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                        error: function (error) {
                            console.log('error:', error)
                        },
                    });
                } else {
                    $('select[name="origin"]').empty();
                }
            });

            $('select[name="province_destination"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="city_destination"]').append();
                            $.each(data, function (key, value) {
                                $('select[name="city_destination"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                        error: function (error) {
                            console.log('error:', error)
                        },
                    });
                } else {
                    $('select[name="city_destination"]').empty();
                }
            });

            $('select[name="city_destination"]').on('change', function () {
                var subdistrictId = $(this).val();
                if (subdistrictId) {
                    $.ajax({
                        url: 'getSubdistrict/ajax/' + subdistrictId,
                        type: "GET",
                        success: function (response) {
                            $('select[name="destination"]').html(response);
                        },
                        error: function (error) {
                            console.log('error:', error)
                        },
                    });
                } else {
                    $('select[name="destination"]').empty();
                }
            });
        });

    </script>
</body>

</html>
