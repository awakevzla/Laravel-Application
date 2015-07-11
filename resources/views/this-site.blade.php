<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-focus"> <!--<![endif]-->
<head>

    <title>
        @section('title')

        @show
    </title>

    @section('css')
        <!-- Web fonts -->
        <link rel="stylesheet"
              href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    @show

</head>
<body>

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content">
        @section('content')

        @show
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->

</div>
<!-- END Page Container -->

@section('js')

@show
</body>
</html>