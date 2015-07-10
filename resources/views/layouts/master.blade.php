<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="<?php url('foo'); ?>css/bootstrap.min.css">
    @yield('styles')
</head>
<body>
@yield('layout')
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>