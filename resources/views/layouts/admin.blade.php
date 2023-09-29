<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="description" />
    <meta content="Muajjam" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <link rel="shortcut icon" href="{{ asset('assets/admin') }}/assets/images/favicon_1.ico">
    <link href="{{ asset('assets/admin') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin') }}/assets/css/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin') }}/plugins/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin') }}/assets/css/moltran.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin') }}/assets/css/chosen.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin') }}/assets/css/style.css" rel="stylesheet" type="text/css" />
    @stack('customCss')
    <script src="{{ asset('assets/admin') }}/assets/js/modernizr.min.js"></script>
</head>

<body class="fixed-left">
    <div id="wrapper">

        @include('./layouts.includes.header');
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                @include('./layouts.includes.user-details');
                @include('./layouts.includes.sidebar');
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('./layouts.includes.footer');
        </div>
    </div>
    <script>
        var resizefunc = [];
    </script>
    <script src="{{ asset('assets/admin') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/parsley.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/datatables.min.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/detect.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/fastclick.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/jquery.blockUI.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/waves.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/jquery.nicescroll.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/counterup/jquery.counterup.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/flot-chart/jquery.flot.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/flot-chart/jquery.flot.time.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/flot-chart/jquery.flot.resize.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/flot-chart/jquery.flot.pie.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/flot-chart/jquery.flot.selection.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/flot-chart/jquery.flot.stack.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/pages/jquery.todo.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/pages/jquery.dashboard.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/jquery.app.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/summernote/summernote-bs4.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/chosen.jquery.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/jquery.printPage.js"></script>
    <script src="{{ asset('assets/admin') }}/assets/js/custom.js"></script>

    @stack('customScripts')
</body>

</html>
