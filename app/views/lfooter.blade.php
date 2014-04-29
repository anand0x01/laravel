<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SenseiHub</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app_version1.css') }}">
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{ HTML::script('js/jquery-1.11.0.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/app_version1.js') }}
</head>
<body class="@yield('body_class')">
    @include('navbar')
    @yield('content')
</body>
</html>
