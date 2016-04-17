@extends('layouts.master')

@section('title', 'Gloops')

@section('content')

<div class="home">

	@if (session()->has('success'))
	    <div class="col-xs-12" ng-controller="AlertController">
	    	<div class="info-box success" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-check"></i>{{ Session::get('success') }}
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
	    </div>
	@endif

	@if (count($errors) > 0)
	    <div class="col-xs-12" ng-controller="AlertController">
	    	<div class="info-box error" ng-hide="hidden" ng-class="{fade: startFade}">
	    		@foreach ($errors->all() as $error)
					<p>
						<i class="fa fa-times"></i>{{ $error }}
						<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
					</p>
				@endforeach
			</div>
	    </div>
	@endif
	
	<div class="col-xs-12 video-container padding-0">
		<video class="home-video" poster="" autoplay="true" muted loop>
			<source src="video/home.mp4" type="video/mp4">
		<!-- 	<source src="video/home.webm" type="video/webm"> -->
		</video>
		<div class="video-layer">
			@if(Auth::check())
				<h1>Record now</h1>
				<center><a href="{{ route('station') }}" class="basic-button">Your station</button></a>
			@else
				<h1>Join now</h1>
				<center><a href="{{ route('getRegister') }}" class="basic-button">Register</button></a>
			@endif
		</div>
		<a target="_blank" class="youtube-link" href="/">
			<i class="fa fa-play"></i>
		</a>
	</div>

	<section class="information">
		<div class="col-xs-12 col-md-4">
			<center><i class="fa fa-microphone fa-5x" aria-hidden="true"></i></center>
			<p>Start by <strong>recording</strong> or <strong>uploading</strong> your guitar loops in your own loop <strong>station</strong>, where you can manage all your personal loops.</p>
		</div>

		<div class="col-xs-12 col-md-4">
			<center><i class="fa fa-music fa-5x" aria-hidden="true"></i></center>
			<p>Your guitar loops will end up in the gloops <strong>library</Strong>. Here you can listen and <strong>favourite</strong> as many guitar loops as you want.</p>
		</div>

		<div class="col-xs-12 col-md-4">
			<center><i class="fa fa-bolt fa-5x" aria-hidden="true"></i></center>
			<p>Gain <strong>reputation</strong> when people favourite your loops. That way you will distinguish yourself from a regular user in the community.</p>
		</div>
	</section>

</div>



@stop
