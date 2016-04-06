@extends('layouts.master')

@section('title', 'Your Guitar Loops Account')

@section('content')

<div class="station" ng-controller="ProfileController">

	<div class="col-xs-12">
		<h2 class="block-title"><i class="fa fa-star"></i> Your favourite loops</i></h2>
	</div>

	@if(Auth::check())

		<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in favouriteLoops | limitTo:loopLimit track by $index" ng-init="isFavourite=loop.isFavourite">
			<div class="row loop-box favourite">
			  	<div class="col-xs-2">
			    	<a class="play-button" ng-click="playLoop($event)">
			      		<i class="fa fa-play"></i>
			   		</a>
				    <audio class="music" controls loop>
				      	<source src="<% loop.loop_path %>" type="audio/mpeg">
				       	Your browser does not support the audio element.
				    </audio>
			  	</div>
			  	<div class="col-xs-7">
			    	<h3 class="loop-title"><% loop.name %></h3>
			    	<p class="duration">0:00</p>
			    	<p class="category"><i class="fa fa-music"></i> <% loop.category.name %></p>
			  	</div>
			  	<div class="col-xs-3">
			    	<div class="user-info">
			    		<div class="user-avatar" style="background-image: url(<% loop.user.avatar %>)"></div>
			    		<span class="user-name"><% loop.user.name %></span>
						<span class="reputation-count"><i class="fa fa-bolt"></i> 53</span>
			    	</div>
			  	</div>
				<div class="favourite">
				  	<i class="fa fa-star active" ng-click="favourite(loop.id); removeFavourite(loop)"></i>
				</div>
			</div>
			<div class="labels">
				<p ng-repeat="tag in loop.tags"><span class="label"><i class="fa fa-tag"></i> <% tag.name %></span></p>
			</div>
		</div>

		<div ng-show="favouriteLoops.length > 9"  class="col-xs-12">
			<button class="basic-button load-more-button" ng-click="loopLimit = loopLimit + 3" href="">Load more</button>
		</div>

		<div ng-show="favouriteLoops.length === 0" class="col-xs-12" ng-controller="AlertController">
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info"></i>You currently don't have anny <strong>favourite guitar loops</strong>.
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

	@endif

</div>

@stop