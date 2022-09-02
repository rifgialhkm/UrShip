<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Ongkir | UrShip</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
                    <div class="col-10 ml-auto mr-auto">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0"> Cek Ongkos Kirim </h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="col-10  ml-auto mr-auto">
                        <div class="card card-default">
                            <form action="{{ route('cek-ongkir') }}" method="get">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Asal</label>
                                                <select class="form-control select2bs4" name="province_origin"
                                                    style="width: 100%;">
                                                    <option selected="selected" disabled>-- Pilih Provinsi --</option>
                                                    @foreach($province as $data)
                                                    <option value="{{ $data->id }}">{{ $data->province }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <select class="form-control select2bs4" name="origin"
                                                    style="width: 100%;">
                                                    <option selected="selected" disabled>-- Pilih Kota/kabupaten --
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <input type="hidden" name="originType" value="city">
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tujuan</label>
                                                <select class="form-control select2bs4" name="province_destination"
                                                    style="width: 100%;">
                                                    <option selected="selected" disabled>-- Pilih Provinsi --</option>
                                                    @foreach($province as $data)
                                                    <option value="{{ $data->id }}">{{ $data->province }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <select class="form-control select2bs4" name="city_destination"
                                                    style="width: 100%;">
                                                    <option selected="selected" disabled>-- Pilih Kota/Kabupaten --
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <select class="form-control select2bs4" name="destination"
                                                    style="width: 100%;">
                                                    <option selected="selected" disabled>-- Pilih Kecamatan --</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <input type="hidden" name="destinationType" value="subdistrict">
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Berat Paket</label>
                                                <input type="text" class="form-control" name="weight"
                                                    placeholder="Masukkan berat">
                                                <small>Dalam gram contoh = 1700/1,7kg</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kurir</label>
                                                <select class="select2bs4" name="courier[]" multiple="multiple"
                                                    data-placeholder="Pilih kurir (boleh pilih lebih dari 1)"
                                                    style="width: 100%;">
                                                    @foreach($listCourier as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cek Harga</button>
                                </div>
                            </form>
                            @if($checkCost)
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>Kurir</th>
                                            <th>Service</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Estimasi</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($checkCost as $result)
                                        <tr>
                                            <td>{{ $result['name'] }}</td>
                                            <td>{{ $result['service'] }}</td>
                                            <td>{{ $result['description'] }}</td>
                                            <td>@currency($result['value'])</td>
                                            <td>
                                                @if(empty($result['etd']))
                                                {{ $result['etd'] }}
                                                @else
                                                {{ $result['etd'] }} hari
                                                @endif
                                            </td>
                                            <td>{{ $result['note'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else

                            @endif
                            <!-- /.card-body -->
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
