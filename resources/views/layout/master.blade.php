@php
    /** @var \App\Models\Accounts\Role $role */
    $role = session()->get('user_role');
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | General Form Elements</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('theme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/dist/css/skins/_all-skins.min.css') }}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @yield('style')
</head>
<body class="@if($role->level > 5) skin-blue sidebar-mini @else skin-blue sidebar-mini sidebar-collapse @endif">
<div class="wrapper">

    @include('layout.header')
    @include('layout.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                General Form Elements
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
            </ol>
        </section>

        <section class="content">
            @yield('content')
        </section>
    </div>

    @include('layout.footer')
    <div class="control-sidebar-bg"></div>
</div>

<script src="{{ asset('theme/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('theme/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('theme/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('theme/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('theme/dist/js/demo.js') }}"></script>
<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/qhn.js') }}"></script>
<script>
    $('.select2').select2();
</script>
@yield('script')

</body>
</html>
