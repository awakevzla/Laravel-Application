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