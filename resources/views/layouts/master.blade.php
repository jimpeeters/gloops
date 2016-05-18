<!doctype html>
<html lang="en" ng-app="gloopsApp">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- if(!Request::is('record')) -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/css/libs/bootstrap.min.css')}}">
    <!-- Chosen select  -->
    <link rel="stylesheet" href="{{asset('/css/libs/chosen.css')}}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
<!--else
  <link rel="stylesheet" href="{{secure_asset('/css/libs/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('/css/style.css')}}"> 
endif-->


    <link rel="apple-touch-icon" sizes="57x57" href="images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
    <link rel="manifest" href="images/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

<title>Gloops - @yield('title')</title>

</head>

<body>

    <div class="container" ng-controller="MainController">
        <!-- Header -->
        @include('navigation')
        
        <!-- Overheating reward -->
        @include('reward-modals.overheating')

        <div class="row content" ng-class="{ 'overheating' : isOverheating() }">

            <div ng-show="!isSearching">
        	   @yield('content')
            </div>

            <div ng-show="isSearching" class="search">
               @include('search-results')
            </div>

        </div>

        @include('footer')

    </div>

<!-- Load all assets over http when not on recording
if(!Request::is('record'))-->

    <!-- Jquery library -->
    <script src="{{asset('/js/libs/jquery.min.js')}}"></script>

    <!-- Angular -->
    <script type="text/javascript" src="{{asset('/bower_components/angular/angular.min.js')}}"></script>
    
    <!-- Gapless5 loop library -->
    <script type="text/javascript" src="{{asset('/js/libs/gapless5.js')}}"></script>
    
    <!-- Chosen Jquery -->
    <script type="text/javascript" src="{{asset('/js/libs/chosen.jquery.min.js')}}"></script>
    
    <!-- Custom Jquery -->
    <script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>

    <!-- Peak.js  -->
    <!-- <script src="{{asset('/bower_components/peaks.js/src/main.js')}}"></script> -->
    <script src="http://wzrd.in/standalone/peaks.js"></script>
    
    <!-- Audio recorder angular -->
    <script src="{{asset('/bower_components/angularAudioRecorder/dist/angular-audio-recorder.js')}}"></script>
    
    <!--- Wave display -->
    <!-- <script src="{{asset('/bower_components/wavesurfer.js/dist/wavesurfer.min.js')}}"></script> -->
    
    <!-- angular animation -->
    <script type="text/javascript" src="{{asset('/js/libs/angular-animate.min.js')}}"></script>

    <!-- Bootstrap js -->
    <script type="text/javascript" src="{{asset('js/libs/bootstrap.min.js')}}"></script>
    
    <!-- Custom angular -->
    <!-- <script type="text/javascript" src="{{asset('/js/modules.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('/js/angular/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/angular/services/services.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/angular/directives/directives.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/angular/controllers/controllers.js')}}"></script>
    
<!-- else
   <script src="{{secure_asset('/js/libs/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/libs/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/libs/gapless5.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/jquery.js')}}"></script>
    <script type="text/javascript" src="http://wzrd.in/standalone/peaks.js"></script>
    <script src="{{secure_asset('/bower_components/angularAudioRecorder/dist/angular-audio-recorder.js')}}"></script>
    <script src="{{secure_asset('/bower_components/peaks.js/src/main.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/libs/angular-animate.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('js/libs/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/angular/app.js')}}"></script>
endif  -->

<!-- Open login modal with error messages -->
@if(session()->has('loginModal'))
    <script>
        $(document).ready(function() {
            $('#loginModal').modal('show');
        });
    </script>
@endif

</body>
</html>