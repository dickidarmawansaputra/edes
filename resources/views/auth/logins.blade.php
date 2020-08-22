<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin desa | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset ('assets/srtdash/assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/srtdash/assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset ('assets/srtdash/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
        <!-- sidebar menu area start -->
        <div class="login-area login-s2">
            <div class="container">
                <div class="login-box ptb--100">
                    <form>
                        <div class="login-form-head">
                            <h4>Admindes</h4>
                            <p>Sistem Informasi Admistrasi Desa</p>
                        </div>
                        <div class="login-form-body">
                            <div class="form-gp">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" id="exampleInputEmail1">
                                <i class="ti-email"></i>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" id="exampleInputPassword1">
                                <i class="ti-lock"></i>
                                <div class="text-danger"></div>
                            </div>
                            <div class="row mb-4 rmber-area">
                            </div>
                            <div class="submit-btn-area">
                                <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    <!-- offset area start -->
    
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="{{ asset('assets/srtdash/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/srtdash/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/srtdash/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/srtdash/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/srtdash/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/srtdash/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/srtdash/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js') }}"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js') }}"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js') }}"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset('assets/srtdash/assets/js/line-chart.js') }}"></script>
    <!-- all bar chart activation -->
    <script src="{{ asset('assets/srtdash/assets/js/bar-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('assets/srtdash/assets/js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('assets/srtdash/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/srtdash/assets/js/scripts.js') }}"></script>
</body>

</html>
