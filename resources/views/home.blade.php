@extends('layouts.master')

@section('title', 'Gloops')

@section('content')

<div class="home">
	<div class="col-xs-12 video-container padding-0">
		<video class="home-video" poster="" autoplay="true" muted loop>
			<source src="video/home.mp4" type="video/mp4">
		<!-- 	<source src="video/home.webm" type="video/webm"> -->
		</video>
		<div class="video-layer">
			<!-- if not logged in/registered 
			<h1>Join now</h1>
			<a href="" class="ghost-button-white center-button">Register</a>-->

			<!-- if logged in -->
			<h1>Record now</h1>
			<a href="" class="ghost-button-white center-button">Your station</a>

		</div>
		<a target="_blank" class="youtube-link" href="/">
			<i class="fa fa-play"></i>
		</a>
	</div>
</div>



@stop
