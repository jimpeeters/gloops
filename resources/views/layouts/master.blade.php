<!doctype html>
<html lang="en" ng-app="gloopsApp">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

@if(!Request::is('record'))
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/css/libs/bootstrap.min.css')}}">
    <!-- Chosen select  -->
    <link rel="stylesheet" href="{{asset('/css/libs/chosen.css')}}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
@else
    <link rel="stylesheet" href="{{secure_asset('/css/libs/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('/css/style.css')}}">
@endif

<title>Gloops - @yield('title')</title>

</head>

<body>

    <div class="container" ng-controller="MainController">
        <!-- Header -->
        @include('navigation')
        
        <!-- Overheating reward -->
        @include('reward-modals.overheating')

        <div class="row content" ng-class="{ 'overheating' : isOverheating() }">

        	@yield('content')

        </div>

        @include('footer')

    </div>

<!-- Load all assets over https when recording -->
@if(!Request::is('record'))

    <!-- Jquery library -->
    <script src="{{asset('/js/libs/jquery.min.js')}}"></script>

    <!-- Angular -->
    <script type="text/javascript" src="{{asset('/js/libs/angular.min.js')}}"></script>
    <!--<script src="{{asset('/bower_components/angular/angular.min.js')}}"></script>-->
    
    <!-- Gapless5 loop library -->
    <script type="text/javascript" src="{{asset('/js/libs/gapless5.js')}}"></script>
    
    <!-- Chosen Jquery -->
    <script type="text/javascript" src="{{asset('/js/libs/chosen.jquery.min.js')}}"></script>
    
    <!-- Custom Jquery -->
    <script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
    
    <!-- Audio recorder angular -->
    <script src="{{asset('/bower_components/angularAudioRecorder/dist/angular-audio-recorder.min.js')}}"></script>
    
    <!--- Wave display -->
    <script src="{{asset('/bower_components/wavesurfer.js/dist/wavesurfer.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('/js/libs/angular-animate.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script type="text/javascript" src="{{asset('js/libs/bootstrap.min.js')}}"></script>
    
    <!-- Angular audio module -->
    <!-- <script src="bower_components/angular-audio/app/angular.audio.js"></script> -->
    
    <!-- Custom angular -->
    <!-- <script type="text/javascript" src="{{asset('/js/modules.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('/js/angular/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/angular/services/services.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/angular/directives/directives.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/angular/controllers/controllers.js')}}"></script>
    
@else
    <script src="{{secure_asset('/js/libs/jquery.min.js')}}"></script>
    <!--<script type="text/javascript" src="{{secure_asset('/js/libs/angular.min.js')}}"></script>-->
        <script type="text/javascript" src="{{secure_asset('/bower_components/angular/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/libs/gapless5.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/jquery.js')}}"></script>
    <script src="{{secure_asset('/bower_components/angularAudioRecorder/dist/angular-audio-recorder.js')}}"></script>
    <script src="{{secure_asset('/bower_components/wavesurfer.js/dist/wavesurfer.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/libs/angular-animate.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('js/libs/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/angular/app.js')}}"></script>
@endif

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