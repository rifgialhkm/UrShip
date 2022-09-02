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
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        .timeline div .fas {
            height: 21px;
            left: 22px;
            width: 21px;
        }

    </style>
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
                        <div class="col-10 mx-auto">
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
                                                    <input type="text" class="form-control" name="waybill"
                                                        value="{{ request('waybill') }}"
                                                        placeholder="Masukkan nomor resi" required>
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
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                        <button type="submit" class="btn btn-primary">Cek Resi</button>
                                    </div>
                                </form>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    @if($summary && $details && $manifest)
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-body table-responsive">
                                    <div class="row">
                                        <table class="table table-hover">
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
                                                    <td colspan="6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 class="font-weight-bold">Info Pengiriman</h5>
                                                                <dl>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <dt>Tanggal Pengiriman</dt>
                                                                            <dd>{{ $details['waybill_date'] }}</dd>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <dt>Asal</dt>
                                                                            <dd>{{ $details['origin'] }}</dd>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <dt>Tujuan</dt>
                                                                            <dd>{{ $details['destination'] }}</dd>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <dt>Pengirim</dt>
                                                                            <dd>{{ $details['shippper_name'] }}</dd>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <dt>Penerima</dt>
                                                                            <dd>{{ $details['receiver_name'] }}</dd>
                                                                        </div>
                                                                    </div>
                                                                </dl>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="font-weight-bold">Status Pengiriman</h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <!-- The time line -->
                                                                        <div class="timeline">
                                                                            @foreach($manifest as $manifest_date =>
                                                                            $manifestItem)
                                                                            <!-- timeline time label -->
                                                                            <div class="time-label">
                                                                                <span class="bg-gray">{{ $manifest_date }}</span>
                                                                            </div>
                                                                            <!-- /.timeline-label -->
                                                                            @foreach($manifestItem as $item)
                                                                            <!-- timeline item -->
                                                                            <div>
                                                                                <i class="fas bg-gray"></i>
                                                                                <div class="timeline-item">
                                                                                    <span
                                                                                        class="time">{{ $item['manifest_time'] }}</span>
                                                                                    <h3 class="timeline-header">
                                                                                        {{ $item['manifest_description'] }}
                                                                                    </h3>
                                                                                </div>
                                                                            </div>
                                                                            <!-- END timeline item -->
                                                                            @endforeach
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.col -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    @else

                    @endif
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

    </script>
</body>

</html>
