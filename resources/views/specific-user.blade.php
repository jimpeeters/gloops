@extends('layouts.master')

@section('title', 'Account page')

@section('content')
<div class="profile" ng-controller="SpecificuserController" ng-init="getSpecificUserLoops({{ $user->id }})">

	<div class="title-section" style="background-image: url({{ $user->avatar }})">
		<h1>{{ $user->name }}</h1>
	</div>

	<div class="col-xs-12">
		<center>
			<div class="profile-picture" style="background-image: url({{ $user->avatar }})">
			</div>
			<h2 class="profile-name">{{ $user->name }}</h2>
			<ul class="profile-rank" title="This user has {{$user->rating}} reputation" data-toggle="tooltip" data-placement="left" tooltip>
				@if($user->rating == 0)
					<li></li>
				@else
					<li class="filled"></li>
				@endif

				@if($user->rank > 1 && $user->rank < 3)
					<li class="filled"></li>
				@else
					<li></li>
				@endif

				@if($user->rank > 2 && $user->rank < 4)
					<li class="filled"></li>
				@else
					<li></li>
				@endif

				@if($user->rank > 3 && $user->rank < 5)
					<li class="filled"></li>
				@else
					<li></li>
				@endif

				@if($user->rank > 4)
					<li class="filled"></li>
				@else
					<li></li>
				@endif
				
			</ul>
			<ul class="profile-rank-info">
				<li>
					<img class="profile-rank-icon" src="/images/rankIcons/rank_1.png" alt="Rank 1 icon">
					<p>0</p>
				</li>
				<li>
					<img class="profile-rank-icon" src="/images/rankIcons/rank_2.png" alt="Rank 2 icon">
					<p>20</p>
				</li>
				<li>
					<img class="profile-rank-icon" src="/images/rankIcons/rank_3.png" alt="Rank 3 icon">
					<p>50</p>
				</li>
				<li>
					<img class="profile-rank-icon" src="/images/rankIcons/rank_4.png" alt="Rank 4 icon">
					<p>100</p>
				</li>
				<li>
					<img class="profile-rank-icon" src="/images/rankIcons/rank_5.png" alt="Rank 5 icon">
					<p>500</p>
				</li>
			</ul>
		</center>
	</div>

	<div class="col-xs-12">
		<h2 class="block-title"><i class="fa fa-star"></i> Most popular loops</i></h2>
	</div>

	<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in popularLoops | limitTo:loopLimit track by loop.id" ng-init="isFavourite=loop.isFavourite">

		<div class="row loop-box" ng-class="{ 'favourite' : isFavourite }">
		  	<div class="col-xs-2">
		    	<a class="play-button" ng-click="playLoop(loop, $event)">
		      		<i class="fa fa-play"></i>
		   		</a>
			    <div class="gapless-block" id="gapless_<% loop.id %>"></div>
		  	</div>
		  	<div class="col-xs-7">
		    	<h3 class="loop-title"><% loop.name %></h3>
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
			<p ng-repeat="tag in loop.tags"><span class="label"><i class="fa fa-tag"></i> <% tag.name %></span></p>
		</div>
	</div>

	<div ng-show="popularLoops.length > 9" class="col-xs-12">
		<button class="basic-button load-more-button" href="" ng-click="loopLimit = loopLimit + 3">Load more</button>
	</div>

</div>

@stop