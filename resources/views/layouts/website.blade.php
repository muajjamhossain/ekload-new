<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $basic->basic_favicon? asset('uploads/basic/'.$basic->basic_favicon) : asset('assets/website/assets/img/favicon.ico') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/default.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/responsive.css">
    @stack('websiteCustomCss')
    <title>{{$basic->basic_title.'|'.$basic->basic_subtitle}}</title>
</head>

<body>
    @include('./layouts.website.includes.header');

    @yield('content');

    @include('./layouts.website.includes.footer');

    {{-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/60fd4044649e0a0a5ccdd783/1fbek64in';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script> --}}


    <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/64e2c002cc26a871b030612c/1h8ars2n8';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
    <!--End of Tawk.to Script-->


    <!-- JS here -->
    <script src="{{ asset('assets/website') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/one-page-nav-min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/jquery.meanmenu.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/ajax-form.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/plugins.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/main.js"></script>

    @stack('websiteCustomScripts')
</body>

</html>
