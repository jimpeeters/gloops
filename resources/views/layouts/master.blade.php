<!doctype html>
<html lang="en" ng-app="gloopsApp">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- Bootstrap -->
<link rel="stylesheet" href="css/libs/bootstrap.min.css">

<!-- Custom css -->
<link rel="stylesheet" href="css/style.css">

<title>Gloops - @yield('title')</title>

</head>

<body>

    <div class="container">

        <!-- Header -->
        @include('snippets.navigation')

        <div class="row content">
        	@yield('content')
        </div>

    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery.min.js"><\/script>')</script>

<!-- <script src="js/libs/modernizr.min.js"></script> -->

<!-- Bootstrap js -->
<script type="text/javascript" src="{{asset('js/libs/bootstrap.min.js')}}"></script>
<!-- Angular -->
<script type="text/javascript" src="{{asset('/js/libs/angular.min.js')}}"></script>


</body>
</html>