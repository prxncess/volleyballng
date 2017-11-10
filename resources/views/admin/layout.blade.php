<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('css/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    {{--<link href="{{asset('css/ripples.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap.material-design.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">


@include('admin.navbar.navbar')
    <div id="page-wrapper">

        <div class="container-fluid">
            @yield('content')
        </div>

    </div>

</div>
<!-- /#page-wrapper -->


<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/jquery2.js')}}"></script>
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('js/plugins/morris/raphael.min.js')}}"></script>
{{--<script src="{{asset('js/plugins/morris/morris.min.js')}}"></script>--}}
{{--<script src="{{asset('js/plugins/morris/morris-data.js')}}"></script>--}}
<script src="{{asset('js/material.min.js')}}"></script>
<script src="{{asset('js/ripples.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
/*        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });*/
        $.material.init()

    })

</script>
@yield('footer-scripts')
</body>

</html>
