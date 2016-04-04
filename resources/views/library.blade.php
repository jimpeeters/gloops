@extends('layouts.master')

@section('title', 'Guitar loops library')

@section('content')

<div class="library" ng-controller="LibraryController">

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
                <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" ng-click="includeCategory('Blues')"/>
                <label for="checkboxG1" class="css-label">Blues</label>
            </li>
            <li>
                <input type="checkbox" name="checkboxG2" id="checkboxG2" class="css-checkbox" ng-click="includeCategory('Pop')"/>
                <label for="checkboxG2" class="css-label">Pop</label>
            </li>
            <li>
                <input type="checkbox" name="checkboxG3" id="checkboxG3" class="css-checkbox" ng-click="includeCategory('Rock')"/>
                <label for="checkboxG3" class="css-label">Rock</label>
            </li>
            <li>
                <input type="checkbox" name="checkboxG4" id="checkboxG4" class="css-checkbox" ng-click="includeCategory('Country')"/>
                <label for="checkboxG4" class="css-label">Country</label>
            </li>
            <li>
                <input type="checkbox" name="checkboxG5" id="checkboxG5" class="css-checkbox" ng-click="includeCategory('Flamenco')"/>
                <label for="checkboxG5" class="css-label">Flamenco</label>
            </li>
            <li>
                <input type="checkbox" name="checkboxG6" id="checkboxG6" class="css-checkbox" ng-click="includeCategory('Alternative')"/>
                <label for="checkboxG6" class="css-label">Alternative</label>
            </li>
            <li>
                <input type="checkbox" name="checkboxG7" id="checkboxG7" class="css-checkbox" ng-click="includeCategory('Punk')"/>
                <label for="checkboxG7" class="css-label">Punk</label>
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
			<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in loops | limitTo:loopLimit | filter:categoryFilter" ng-init="isFavourite=loop.isFavourite">
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
                    @if(Auth::check())
    				  	<div class="favourite">
    				  			<i class="fa" ng-class="{ 'fa-star active' : isFavourite, 'fa-star-o' : !isFavourite }" ng-click="favourite(loop.id)"></i>
    				  	</div>
                    @else
    				  	<div class="favourite">
    				  			<i class="fa fa-star-o"></i>
    				  	</div>
                    @endif
				</div>
				<div class="labels">
					<p ng-repeat="tag in loop.tags"><span class="label"><i class="fa fa-tag"></i> <% tag.name %></span></p>
				</div>
			</div>
            <div class="col-xs-12">
                <button class="basic-button load-more-button" href="" ng-click="loopLimit = loopLimit + 3">Load more</button>
            </div>
		</div>
    </div>
</div>

@stop