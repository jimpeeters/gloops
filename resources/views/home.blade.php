@extends('layouts.master')

@section('title', 'Homepage')

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

	<section class="general scrollable-section" data-section-title="General info">
		
		@if(Auth::check())
			<h1>DISCOVER GLOOPS</h1>
			<p>Visit your station to start uploading and managing your own loops!</p>
			<a href="{{ route('station') }}" class="basic-button">YOUR STATION</a>
		@else
			<h1>JOIN GLOOPS</h1>
			<p>Join our community and start uploading and managing your own loops!</p>
			<a href="{{ route('getRegister') }}" class="basic-button">REGISTER NOW</a>
		@endif
	</section>

	<section class="video scrollable-section" data-section-title="What is gloops?">
		<div class="col-xs-12 col-md-6 col-lg-5">
			<h2>WHAT IS GLOOPS?</h2>
			<p>Watch our demonstration video.</p>
			<img class="arrow-right hidden-sm hidden-xs" src="/images/arrow-right.png" alt="Arrow that points at video">
		</div>
		<div class="col-xs-12 col-md-6 col-lg-7">
			<iframe title="What is gloops?" src="https://www.youtube.com/embed/2MKaWri-h18" frameborder="0" allowfullscreen></iframe>
		</div>
	</section>

	<section class="popular scrollable-section" data-section-title="Popular loops">
		<div class="col-xs-12">
			<h2 class="title">Popular loops</h2>
		</div>
		<i class="fa fa-star star-background"></i>
		<i class="fa fa-star star-background-2"></i>
		<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in loops" ng-init="isFavourite=loop.isFavourite">
			<div class="row loop-box" ng-class="{ 'favourite' : isFavourite }">
			  	<div class="col-xs-2">
			    	<a class="play-button" ng-click="playLoop(loop, $event)">
			      		<i id="play-button-<% loop.id %>" class="fa fa-play"></i>
			   		</a>
				    <div class="gapless-block" id="gapless_<% loop.id %>"></div>
			  	</div>
			  	<div class="col-xs-7">
			    	<a href="/loop/name/<% loop.name %>" class="loop-link"><h3 class="loop-title"><% loop.name %></h3></a>
			    	<p class="duration" id="gapless_<% loop.id %>_duration">0:00</p>
			    	<p class="category"><i class="fa fa-music"></i> <% loop.category.name %></p>
			  	</div>
			  	<div class="col-xs-3">
			    	<div class="user-info">
			    		<a href="/user/<% loop.user.name %>">
			    			<div class="user-avatar" style="background-image: url(<% loop.user.avatar %>)"></div>
			    		</a>
			    		<p class="user-name"><% loop.user.name %></p>
	                    <p class="rank-text">
	                        <img class="rank-icon" ng-src="/images/rankIcons/rank_<% loop.user.rank %>.png" alt="This users rank medal"> <% loop.user.rating %>
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
				<p ng-repeat="tag in loop.tags">
					<span class="label">
						<i class="fa fa-tag"></i> <a href="/tag/<% tag.name %>"><% tag.name %></a>
					</span>
				</p>
			</div>
		</div>
	</section>

	<section class="information scrollable-section" data-section-title="Information">
		<div class="col-xs-12 col-sm-4 information-record">
			<center>
				<a href="{{ route('station') }}" class="btn-floating waves-effect waves-light btn-large information-button">
			    	<i class="fa fa-microphone"></i> 
			    </a>
			</center>
			<p>Start by <strong>recording</strong> or <strong>uploading</strong> your guitar loops in your own loop <strong>station</strong>, where you can manage all your personal loops.</p>
		</div>

		<div class="col-xs-12 col-sm-4 information-library">
			<center>
				<a href="{{ route('library') }}" class="btn-floating waves-effect waves-light btn-large information-button">
			    	<i class="fa fa-music"></i>
			    </a>
			</center>
			<p>Your guitar loops will end up in the gloops <strong>library</Strong>. Here you can listen and <strong>favourite</strong> as many guitar loops as you want.</p>
		</div>

		<div class="col-xs-12 col-sm-4 information-reputation">
			<center>
				<a href="{{ route('profile') }}" class="btn-floating waves-effect waves-light btn-large information-button">
			    	<i class="fa fa-bolt"></i> 
			    </a>
			</center>
			<p>Gain <strong>reputation</strong> when people favourite your loops. That way you will distinguish yourself from a regular user in the community.</p>
		</div>
	</section>

	@include('sections.tutorial')
</div>

@stop
