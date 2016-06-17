@extends('layouts.master')

@section('title', 'Tag : ' . $tagname)

@section('content')

<section class="specific-tag" ng-controller="SpecificTagController" ng-init="getLoopsFromTag('{{ $tagname }}')">
	<div class="col-xs-12">
		<h2 class="title">{{ $tagname }}</h2>
	</div>

	<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in loops | limitTo:loopLimit" ng-init="isFavourite=loop.isFavourite">
		<div class="row loop-box" ng-class="{ 'favourite' : isFavourite }">
		  	<div class="col-xs-2">
		    	<a class="play-button" ng-click="playLoop(loop, $event)">
		      		<i class="fa fa-play"></i>
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

	<div ng-show="loops.length > 9" class="col-xs-12">
        <button class="basic-button load-more-button" ng-class="{ hide: loopLimit >= loops.length }" href="" ng-click="loopLimit = loopLimit + 3">Load more</button>
    </div>

	<div ng-show="loops.length <= 0" class="col-xs-12" ng-controller="AlertController">
		<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
			<p>
				<i class="fa fa-info alert-type-icon"></i>There are loops with tag <strong>{{ $tagname }}</strong>.
				<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
			</p>
		</div>
	</div>
</section>

@stop