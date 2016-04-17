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

</div>



@stop
