@extends('layouts.master')

@section('title', 'Gloops')

@section('content')

<div class="home" ng-controller="HomeController">

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
		<div class="col-xs-12 col-sm-4 information-record">
			<center><i class="fa fa-microphone fa-5x" aria-hidden="true"></i></center>
			<p>Start by <strong>recording</strong> or <strong>uploading</strong> your guitar loops in your own loop <strong>station</strong>, where you can manage all your personal loops.</p>
		</div>

		<div class="col-xs-12 col-sm-4 information-library">
			<center><i class="fa fa-music fa-5x" aria-hidden="true"></i></center>
			<p>Your guitar loops will end up in the gloops <strong>library</Strong>. Here you can listen and <strong>favourite</strong> as many guitar loops as you want.</p>
		</div>

		<div class="col-xs-12 col-sm-4 information-reputation">
			<center><i class="fa fa-bolt fa-5x" aria-hidden="true"></i></center>
			<p>Gain <strong>reputation</strong> when people favourite your loops. That way you will distinguish yourself from a regular user in the community.</p>
		</div>
	</section>

	<div class="col-xs-12" id="edit-section">
		<h2 class="block-title"><i class="fa fa-star"></i> Most favourited</i></h2>
	</div>

	<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in loops" ng-init="isFavourite=loop.isFavourite">
		<div class="row loop-box" ng-class="{ 'favourite' : isFavourite }">
		  	<div class="col-xs-2">
		    	<a class="play-button" ng-click="playLoop(loop, $event)">
		      		<i class="fa fa-play"></i>
		   		</a>
			    <div class="gapless-block" id="gapless_<% loop.id %>" /></div>
		  	</div>
		  	<div class="col-xs-7">
		    	<h3 class="loop-title"><% loop.name %></h3>
		    	<p class="duration">0:00</p>
		    	<p class="category"><i class="fa fa-music"></i> <% loop.category.name %></p>
		  	</div>
		  	<div class="col-xs-3">
		    	<div class="user-info">
		    		<div class="user-avatar" style="background-image: url(<% loop.user.avatar %>)"></div>
		    		<p class="user-name"><% loop.user.name %></p>
                    <p class="rank-text">
                        <img class="rank-icon" src="images/rankIcons/rank_<% loop.user.rank %>.png" alt="This users rank medal"> <% loop.user.rating %>
                    </p>
		    	</div>
		  	</div>
            @if(Auth::check())
			  	<div class="favourite">
			  			<i class="fa" ng-class="{ 'fa-star active' : isFavourite, 'fa-star-o' : !isFavourite }" ng-click="favourite(loop.id)"></i>
			  	</div>
            @else
			  	<div class="favourite">
			  			<i class="fa fa-star-o" title="Login to favourite this guitar loop!" data-toggle="tooltip" data-placement="top" tooltip></i>
			  	</div>
            @endif
		</div>
		<div class="labels">
			<p ng-repeat="tag in loop.tags"><span class="label"><i class="fa fa-tag"></i> <% tag.name %></span></p>
		</div>
	</div>
</div>

@stop