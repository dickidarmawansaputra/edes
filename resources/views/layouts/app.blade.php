<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Administrasi Desa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset ('/assets/srtdash/assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css') }}" type="text/css" media="all" />
    @yield('css')
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset ('/assets/srtdash/assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset ('/assets/srtdash/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        @include('layouts.sidebar')
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">@yield('title')</h4>
                            <ul class="breadcrumbs pull-left">
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                           <!--  -->
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
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
    <!-- all pie chart -->
    <script src="{{ asset('assets/srtdash/assets/js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    @yield('js')
    <script src="{{ asset('assets/srtdash/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/srtdash/assets/js/scripts.js') }}"></script>

</body>

</html>
