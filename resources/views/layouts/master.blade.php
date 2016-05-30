<!doctype html>
<html lang="en" ng-app="gloopsApp">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="With gloops you can play guitar while listening to guitar loops. They serve as guitar backing tracks to jam with. You can also upload and manage your own guitar loops in a station. There is also a way to share your favourite loops with friends.">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<link rel="image_src" href="{{asset('/images/ms-icon-310x310.png')}}" />



<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('/css/libs/bootstrap.min.css')}}">
<!-- Chosen select  -->
<link rel="stylesheet" href="{{asset('/css/libs/chosen.css')}}">
<!-- Custom css -->
<link rel="stylesheet" href="{{asset('/css/style.css')}}">


<!-- icon -->
<link rel="apple-touch-icon" sizes="57x57" href="/images/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/images/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/images/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/images/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/images/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/images/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/images/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
<link rel="manifest" href="/images/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/images/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<title>Gloops - @yield('title')</title>

</head>

<body>

    @include('analytics.analyticstracking')

    <div class="container" ng-controller="MainController">

        <!-- Login modal when not logged in -->
        @if(!Auth::check())

            @include('auth.login')

        @endif

        <!-- Open logout modal when successfully logged out-->
        @if(session()->has('successfullLogout'))

            @include('snippets.logout-modal')

        @endif

        <!-- Open login modal when successfully logged in-->
        @if(session()->has('successfullLogin'))

            @include('snippets.login-modal')

        @endif

        <!-- Open register modal when successfully logged in-->
        @if(session()->has('successfullRegister'))

            @include('snippets.register-modal')

        @endif

        <!-- Header -->
        @include('sections.navigation')
        
        <!-- Overheating -->
        @include('snippets.overheating')

        <div class="row content" ng-class="{ 'overheating' : isOverheating() }">

            <div ng-show="!isSearching">
        	   @yield('content')
            </div>

            <div ng-show="isSearching" class="search">
               @include('search-results')
            </div>

        </div>

        @include('snippets.videos-modal')

        @include('sections.footer')


    </div>

    
                        <!-- Recorder control buttons -->
                        <div class="recorder">
                            <button class="start-recording" onclick="FWRecorder.record('audio', 'audio.wav');">
                                
                            </button>
                            <div class="level">
                                <div class="progress"></div>
                            </div>
                            <button class="stop-recording" onclick="FWRecorder.stopRecording('audio');">
                               
                            </button>
                            <button class="start-playing" onclick="FWRecorder.playBack('audio');" title="Play">
                               
                            </button>
                            <div class="upload" style="display: inline-block">
                                <div id="flashcontent">
                                    <p>Your browser must have JavaScript enabled and the Adobe Flash Player installed.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden form for easy specifying the upload request parameters -->
                        <form id="uploadForm" name="uploadForm" action="../upload.php">
                            <input name="authenticity_token" value="xxxxx" type="hidden">
                            <input name="upload_file[parent_id]" value="1" type="hidden">
                            <input name="format" value="json" type="hidden">
                        </form>

<!-- Jquery library -->
<script src="{{asset('/js/libs/jquery.min.js')}}"></script>

<!-- Angular -->
<script type="text/javascript" src="{{asset('/bower_components/angular/angular.min.js')}}"></script>

<!-- Gapless5 loop library -->
<script type="text/javascript" src="{{asset('/js/libs/gapless5.js')}}"></script>

<!-- Chosen Jquery -->
<script type="text/javascript" src="{{asset('/js/libs/chosen.jquery.js')}}"></script>

<!-- Custom Jquery -->
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>

<!-- Audio recorder angular -->
<script src="{{asset('/bower_components/angularAudioRecorder/dist/angular-audio-recorder.js')}}"></script>
 <script type="text/javascript" src="/js/libs/swfobject.js"></script>
    <script type="text/javascript" src="/js/libs/recorder.js"></script>
    <script type="text/javascript" src="/js/libs/basic.js"></script>


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

   

<!-- Open login modal with error messages -->
@if(session()->has('loginModal'))
    <script>
        $(document).ready(function() {
            $('#loginModal').modal('show');
        });
    </script>
@endif

<!-- Open successfull logout modal-->
@if(session()->has('successfullLogout'))
    <script>
        $(document).ready(function() {
            $('#successfullLogoutModal').modal('show');
        });
    </script>
@endif

<!-- Open successfull login modal-->
@if(session()->has('successfullLogin'))
    <script>
        $(document).ready(function() {
            $('#successfullLoginModal').modal('show');
        });
    </script>
@endif

<!-- Open successfull register modal-->
@if(session()->has('successfullRegister'))
    <script>
        $(document).ready(function() {
            $('#successfullRegisterModal').modal('show');
        });
    </script>
@endif

<!-- In profile view scroll with update message -->
@if(session()->has('updateMessage') && Request::is('profile'))
    <script>
        $(document).ready(function() {
            $('html, body').animate({
                scrollTop: $("#edit-section").offset().top -135
            }, 700);
        });
    </script>
@endif

<script>
    $( "#activate-modal, #activate-modal-2" ).click(function() {
        $( '#video-modal' ).openModal();
    });
</script>

</body>
</html>