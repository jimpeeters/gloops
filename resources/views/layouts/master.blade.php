<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<script src="resources/js/libs/modernizr.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Lato:400,300,700,900" rel="stylesheet" type="text/css">

<!-- Bootstrap -->
<link rel="stylesheet" href="resources/css/libs/bootstrap.min.css">

<!-- Custom css -->
<link rel="stylesheet" href="resources/css/style.css">

<title>Gloops - @yield('title')</title>

</head>

<body>

    <div class="container">

        <!-- Header -->
        @include('templates.navigation')

        @yield('content')
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="resources/js/libs/jquery.min.js"><\/script>')</script>

<!-- Bootstrap js -->
<script src="resources/js/libs/bootstrap.min.js"></script>

<script src="resources/js/plugins.js"></script>
<script src="resources/js/custom.js"></script>
</body>
</html>