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
                        <div class="col-lg-3 col-sm-3 col-xs-12 col-md-3">
                            @if(Session::has('gak-ketemu'))
                                <div class="alert alert-danger">
                                    {!! Session::get('gak-ketemu') !!}
                                </div>
                            @elseif(Session::has('ketemu'))
                                <div class="alert alert-success">
                                    {!! Session::get('ketemu') !!}
                                </div>
                            @elseif(Session::has('captcha-salah'))
                                <div class="alert alert-danger">
                                    {!! Session::get('captcha-salah') !!}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                            <div class="widget">
                                <div class="widget-header bordered-bottom bordered-danger">
                                    <span class="widget-caption">Pencarian Data Bagi Hasil</span>
                                </div>
                                <div class="widget-body">
                                    <form id="frmCari" method="POST" action="{{ route('spta') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="pg">Pabrik Gula</label>
                                            <select class="form-control" id="pg" name="pg">
                                                <option value="IF30" {{ (old('pg') == "IF30" ? "selected":"") }}>PG Pangka</option>
                                                <option value="IF32" {{ (old('pg') == "IF32" ? "selected":"") }}>PG Sragi</option>
                                                <option value="IF33" {{ (old('pg') == "IF33" ? "selected":"") }}>PG Rendeng</option>
                                                <option value="IF34" {{ (old('pg') == "IF34" ? "selected":"") }}>PG Mojo</option>
                                                <option value="IF35" {{ (old('pg') == "IF35" ? "selected":"") }}>PG Tasikmadu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_spta">Kode SPTA</label>
                                            <input type="text" class="form-control" name="kode_spta" id="kode_spta" placeholder="ex : 01012019-0001" data-mask="99999999-9999" value="{{ old('kode_spta') }}">
                                        </div>
                                        <div class="form-group refreshCaptcha">
                                            {!! captcha_img('flat') !!}
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="text" class="form-control" name="kode_captcha" id="kode_captcha" placeholder="Masukkan kode diatas" value="{{ old('kode_captcha') }}">
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-danger" onclick="this.disabled=true;this.form.submit();"><i class="fa fa-search"></i> Cari</button>
                                            <button type="button" class="btn btn-success" onclick="refreshCaptcha()"><i class="fa fa-refresh"></i> refresh Captcha</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    <script type="text/javascript">
        function refreshCaptcha()
        {
            $.ajax({
                url: "{{ route('refresh') }}",
                type: "GET",
                dataType: 'html',
                success: function(json){
                    $('.refreshCaptcha').html(json);
                },
                error: function(data){
                    alert('Gagal refresh Captcha !');
                }
            });
        }
    </script>
    @yield('script')
</body>
</html>