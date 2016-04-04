<!doctype html>
<html lang="en" ng-app="gloopsApp">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- Bootstrap -->
<link rel="stylesheet" href="css/libs/bootstrap.min.css">

<!-- Chosen select  -->
<link rel="stylesheet" href="css/libs/chosen.css">

<!-- Custom css -->
<link rel="stylesheet" href="css/style.css">

<title>Gloops - @yield('title')</title>

</head>

<body>

    <div class="container">
        <!-- Header -->
        @include('navigation')

        <div class="row content">

        	@yield('content')

        	<!-- If logged in -->
<!-- 			<div class="col-xs-12 nopadding">
		include('snippets.calltoaction.record')
</div> -->

			<!-- If not logged in -->
			<!-- <div class="row">
				<div class="col-xs-12">
					include('snippets.calltoaction.register')
				</div>
			</div> -->
        </div>

        @include('footer')

    </div>

<script>window.jQuery || document.write('<script src="js/libs/jquery.min.js"><\/script>')</script>

<!-- Chosen Jquery -->
<script type="text/javascript" src="{{asset('/js/libs/chosen.jquery.min.js')}}"></script>

<!-- Custom Jquery -->
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>

<!-- <script src="js/libs/modernizr.min.js"></script> -->
<!-- Angular -->
<script type="text/javascript" src="{{asset('/js/libs/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/libs/angular-animate.min.js')}}"></script>
<!-- Bootstrap js -->
<script type="text/javascript" src="{{asset('js/libs/bootstrap.min.js')}}"></script>

<!-- Angular audio module -->
<!-- <script src="bower_components/angular-audio/app/angular.audio.js"></script> -->

<!-- Custom angular -->
<!-- <script type="text/javascript" src="{{asset('/js/modules.js')}}"></script> -->
<script type="text/javascript" src="{{asset('/js/angular/app.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('/js/angular/directives/directives.js')}}"></script> -->
<script type="text/javascript" src="{{asset('/js/angular/controllers/controllers.js')}}"></script>



</body>
</html>