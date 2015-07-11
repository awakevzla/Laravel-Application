<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>
        @section('title')
            {{$farm->name}}
        @show
    </title>

    <meta name="description"
          content="OneUI - Admin Dashboard Template & UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    @section('css')
        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet"
              href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- OneUI CSS framework -->
        <link href="{{{ asset('/assets/css/oneui.min.css') }}}" rel="stylesheet">
        <link rel="stylesheet" id="css-theme" href="{{{ asset('/assets/css/themes/city.min.css') }}}">
        @show
                <!-- END Stylesheets -->
</head>
<body>

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            @section('content')
                Content. Admin.
            @show
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
        <div class="pull-right">
            Crafted with <i class="fa fa-heart text-city"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
        </div>
        <div class="pull-left">
            <a class="font-w600" href="javascript:void(0)" target="_blank">CSA APP</a> &copy; <span class="js-year-copy"></span>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

@section('js')
    <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
    <script src="{{{ asset('/assets/js/oneui.min.js') }}}"></script>
    @show
</body>
</html>