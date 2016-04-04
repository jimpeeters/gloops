@extends('layouts.master')

@section('title', 'Guitar loops library')

@section('content')

<div class="library" ng-controller="LibraryController as LibCtrl">

	<div class="title-section">
		<h1>LIBRARY</h1>
	</div>

	<div class="col-xs-12 col-sm-2 sidebar">
        <ul class="sidebar-nav" ng-class="{ 'up' : sidebarUp }">
        	<li class="title">
        		<p>General</p>
        	</li>
            <li>
                <a href="#">Most popular</a>
            </li>
            <li>
                <a href="#">Most recent</a>
            </li>
            <li class="title">
                <p>Category</p>
            </li>
            <li>
                <a href="#">Blues</a>
            </li>
            <li>
                <a href="#">Pop</a>
            </li>
            <li>
                <a href="#">Rock</a>
            </li>
            <li>
                <a href="#">Country</a>
            </li>
            <li>
                <a href="#">Flamenco</a>
            </li>
            <li>
                <a href="#">Alternative</a>
            </li>
            <li>
                <a href="#">Punk</a>
            </li>
            <li class="title">
                <p>Duration</p>
            </li>
            <li>
                <a href="#">1s - 5s</a>
            </li>
            <li>
                <a href="#">6s - 10s</a>
            </li>
            <li>
                <a href="#">11s - 15s</a>
            </li>
            <li>
                <a href="#">16s - 20s</a>
            </li>
        </ul>
        <div class="slide-up-toggle" ng-click="sidebarUp = !sidebarUp">
        	<span ng-if="!sidebarUp">Hide filters</span>
        	<span ng-if="sidebarUp">Show filters</span>
           	<i class="fa" ng-class="{ 'fa-arrow-up' : !sidebarUp, 'fa-arrow-down' : sidebarUp }"></i>
        </div>
    </div>
    <div class="col-xs-12 col-sm-10 loops">
    	<div class="row">
    		<div class="col-xs-12">
    			
    		</div>
    	</div>
    	<div class="row">
			<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in loops" ng-init="isFavourite=loop.isFavourite">
				<div class="row loop-box" ng-class="{ 'favourite' : isFavourite }">
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
				    	<p class="duration">0:09</p>
				    	<p class="category"><i class="fa fa-music"></i> <% loop.category.name %></p>
				  	</div>
				  	<div class="col-xs-3">
				    	<div class="user-info">
				    		<div class="user-avatar" style="background-image: url(<% loop.user.avatar %>)"></div>
				    		<span class="user-name"><% loop.user.name %></span>
							<span class="reputation-count"><i class="fa fa-bolt"></i> 53</span>
				    	</div>
				  	</div>
				  	<div class="favourite" ng-if="loggedIn">
				  			<i class="fa" ng-class="{ 'fa-star active' : isFavourite, 'fa-star-o' : !isFavourite }" ng-click="favourite(loop.id)"></i>
				  	</div>
				  	<div class="favourite" ng-if="!loggedIn">
				  			<i class="fa fa-star-o"></i>
				  	</div>
				</div>
				<div class="labels">
					<p ng-repeat="tag in loop.tags"><span class="label"><i class="fa fa-tag"></i> <% tag.name %></span></p>
				</div>
			</div>
		</div>
    </div>
</div>

@stop