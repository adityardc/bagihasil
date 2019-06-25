<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>PTPN IX</title>

    <meta name="description" content="Sistem Informasi Kesekretariatan" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--Basic Styles-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/weather-icons.min.css') }}" rel="stylesheet" />

    <!--Fonts-->
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css"> -->

    <!--Beyond styles-->
    <link href="{{ asset('assets/css/beyond.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/skins/green.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/typicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/sweetalert2/sweetalert2.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/img/logo-icon.png') }}" type="image/x-icon">

    @yield('css')
</head>
<body>
    <div class="loading-container">
        <div class="loader"></div>
    </div>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <!-- <img src="{{ asset('assets/img/logo-sidebar.png') }}" alt="logo" /> -->
                        </small>
                    </a>
                </div>

                {{-- <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="main-container container-fluid">
        <div class="page-container">
            <div class="page-sidebar sidebar-fixed" id="sidebar">
                <ul class="nav sidebar-menu">
                    <li class="active">
                        <a href="#">
                            <i class="menu-icon fa fa-university"></i>
                            <span class="menu-text">Beranda</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="page-content">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home active"></i>
                            <a href="#">BAGI HASIL</a>
                        </li>
                    </ul>
                </div>
                
                <!-- <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            @yield('title')
                        </h1>
                    </div>
                </div> -->
                
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="well with-header with-footer">
                                <div class="header bg-darkorange">
                                    Nomor SPTA : {{ $data->no_spat }}
                                </div>
                                <table class="table table-hover table-striped table-bordered table-responsive">
                                    <thead class="bordered-blueberry">
                                        <tr>
                                            <th width="1">#</th>
                                            <th>Uraian</th>
                                            <th>Katerangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Nomor SPTA</td>
                                            <td>{{ $data->no_spat }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Nama Petani</td>
                                            <td>{{ $data->nama_petani }}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Nomor Kontrak</td>
                                            <td>{{ $data->kode_blok }}</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Kuintal Tebu</td>
                                            <td>{{ $data->netto_final }}</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Rendemen</td>
                                            <td>{{ $data->rendemen_ari }}</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Gula PTR</td>
                                            <td>{{ $data->gula_ptr }}</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Tetes PTR</td>
                                            <td>{{ $data->tetes_ptr }}</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Mutu Tebu</td>
                                            <td>{{ $data->kondisi_tebu }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="footer">
                                    <button type="button" class="btn btn-yellow" onclick="location.href='{{ route('/') }}'">Kembali</button>
                                </div>
                            </div>
                            <!-- <div class="widget">
                                <div class="widget-header bordered-bottom bordered-success">
                                    <span class="widget-caption">Data SPTA Nomor : <label class="label label-danger"><b>{{ $data->no_spat }}</b></label></span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-hover table-striped table-bordered">
                                        <thead class="bordered-blueberry">
                                            <tr>
                                                <th width="1">#</th>
                                                <th>Uraian</th>
                                                <th>Katerangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Nomor SPTA</td>
                                                <td>{{ $data->no_spat }}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Nama Petani</td>
                                                <td>{{ $data->nama_petani }}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Nomor Kontrak</td>
                                                <td>{{ $data->kode_blok }}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Kuintal Tebu</td>
                                                <td>{{ $data->netto_final }}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Rendemen</td>
                                                <td>{{ $data->rendemen_ari }}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Gula PTR</td>
                                                <td>{{ $data->gula_ptr }}</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Tetes PTR</td>
                                                <td>{{ $data->tetes_ptr }}</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Mutu Tebu</td>
                                                <td>{{ $data->kondisi_tebu }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="widget-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-yellow" onclick="location.href='{{ route('/') }}'">Kembali</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Basic Scripts-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!--Beyond Scripts-->
    <script src="{{ asset('assets/js/beyond.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask/jasny-bootstrap.min.js') }}"></script>
    @yield('script')
</body>
</html>