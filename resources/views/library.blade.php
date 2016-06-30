@extends('layouts.master')

@section('title', 'Guitar loops library')

@section('content')

<section class="library" data-ng-controller="LibraryController">
	
	<div class="col-sm-2 hidden-xs sidebar">
	   <ul class="sidebar-nav">
        	<li class="sub-title">
        		<p>General</p>
        	</li>
            <li>
                <i data-ng-click="mostRecent = !mostRecent" data-ng-show="mostRecent" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="mostRecent = !mostRecent" data-ng-show="!mostRecent" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="mostRecent = !mostRecent"  data-ng-class="{ 'underline' : mostRecent }">Most recent</a>
            </li>
            @if(Auth::check())
                <li>
                    <i data-ng-show="yourLoopfilterOn" class="fa fa-check-square" aria-hidden="true"></i>
                    <i data-ng-show="!yourLoopfilterOn" class="fa fa-square-o" aria-hidden="true"></i>
                    <a data-ng-class="{ 'underline' : yourLoopfilterOn }" data-ng-click="activateYourLoopFilter({{ Auth::user()->id }})">Your loops</a>
                </li>
            @endif
            <li class="sub-title">
                <p>Category</p>
            </li>
            <li>
                <i data-ng-click="categoryBlues = !categoryBlues; includeCategory('Blues')" data-ng-show="categoryBlues" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryBlues = !categoryBlues; includeCategory('Blues')" data-ng-show="!categoryBlues" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryBlues = !categoryBlues; includeCategory('Blues')" data-ng-class="{ 'underline' : categoryBlues }">Blues</a>
            </li>
            <li>
                <i data-ng-click="categoryPop = !categoryPop; includeCategory('Pop')" data-ng-show="categoryPop" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryPop = !categoryPop; includeCategory('Pop')" data-ng-show="!categoryPop" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryPop = !categoryPop; includeCategory('Pop')" data-ng-class="{ 'underline' : categoryPop }">Pop</a>
            </li>
            <li>
                <i data-ng-click="categoryRock = !categoryRock; includeCategory('Rock')" data-ng-show="categoryRock" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryRock = !categoryRock; includeCategory('Rock')" data-ng-show="!categoryRock" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryRock = !categoryRock; includeCategory('Rock')" data-ng-class="{ 'underline' : categoryRock }">Rock</a>
            </li>
            <li>
                <i data-ng-click="categoryCountry = !categoryCountry; includeCategory('Country')" data-ng-show="categoryCountry" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryCountry = !categoryCountry; includeCategory('Country')" data-ng-show="!categoryCountry" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryCountry = !categoryCountry; includeCategory('Country')" data-ng-class="{ 'underline' : categoryCountry }">Country</a>
            </li>
            <li>
                <i data-ng-click="categoryFlamenco = !categoryFlamenco; includeCategory('Flamenco')" data-ng-show="categoryFlamenco" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryFlamenco = !categoryFlamenco; includeCategory('Flamenco')" data-ng-show="!categoryFlamenco" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryFlamenco = !categoryFlamenco; includeCategory('Flamenco')" data-ng-class="{ 'underline' : categoryFlamenco }">Flamenco</a>
            </li>
            <li>
                <i data-ng-click="categoryAlternative = !categoryAlternative; includeCategory('Alternative')" data-ng-show="categoryAlternative" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryAlternative = !categoryAlternative; includeCategory('Alternative')" data-ng-show="!categoryAlternative" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryAlternative = !categoryAlternative; includeCategory('Alternative')" data-ng-class="{ 'underline' : categoryAlternative }">Alternative</a>
            </li>
            <li>
                <i data-ng-click="categoryPunk = !categoryPunk; includeCategory('Punk')" data-ng-show="categoryPunk" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryPunk = !categoryPunk; includeCategory('Punk')" data-ng-show="!categoryPunk" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryPunk = !categoryPunk; includeCategory('Punk')" data-ng-class="{ 'underline' : categoryPunk }">Punk</a>
            </li>
            <li>
                <i data-ng-click="categoryMetal = !categoryMetal; includeCategory('Metal')" data-ng-show="categoryMetal" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryMetal = !categoryMetal; includeCategory('Metal')" data-ng-show="!categoryMetal" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryMetal = !categoryMetal; includeCategory('Metal')" data-ng-class="{ 'underline' : categoryMetal }">Metal</a>
            </li>
            <li>
                <i data-ng-click="categoryFolk = !categoryFolk; includeCategory('Folk')" data-ng-show="categoryFolk" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryFolk = !categoryFolk; includeCategory('Folk')" data-ng-show="!categoryFolk" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryFolk = !categoryFolk; includeCategory('Folk')" data-ng-class="{ 'underline' : categoryFolk }">Folk</a>
            </li>
            <li>
                <i data-ng-click="categoryClassic = !categoryClassic; includeCategory('Classic')" data-ng-show="categoryClassic" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryClassic = !categoryClassic; includeCategory('Classic')" data-ng-show="!categoryClassic" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryClassic = !categoryClassic; includeCategory('Classic')" data-ng-class="{ 'underline' : categoryClassic }">Classic</a>
            </li>
            <li>
                <i data-ng-click="categoryReggae = !categoryReggae; includeCategory('Reggae')" data-ng-show="categoryReggae" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryReggae = !categoryReggae; includeCategory('Reggae')" data-ng-show="!categoryReggae" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryReggae = !categoryReggae; includeCategory('Reggae')" data-ng-class="{ 'underline' : categoryReggae }">Reggae</a>
            </li>
            <li>
                <i data-ng-click="categoryFunk = !categoryFunk; includeCategory('Funk')" data-ng-show="categoryFunk" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryFunk = !categoryFunk; includeCategory('Funk')" data-ng-show="!categoryFunk" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryFunk = !categoryFunk; includeCategory('Funk')" data-ng-class="{ 'underline' : categoryFunk }">Funk</a>
            </li>
        </ul>
	</div>

	<div class="col-xs-12 hidden-sm hidden-md hidden-lg sidebar">
        <ul class="sidebar-nav mobile" data-ng-class="{ 'down' : !sidebarUp }">
        	<li class="sub-title">
        		<p>General</p>
        	</li>
            <li>
                <i data-ng-click="mostRecent = !mostRecent" data-ng-show="mostRecent" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="mostRecent = !mostRecent" data-ng-show="!mostRecent" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="mostRecent = !mostRecent" data-ng-class="{ 'underline' : mostRecent }">Most recent</a>
            </li>
            @if(Auth::check())
                <li>
                    <i data-ng-show="yourLoopfilterOn" class="fa fa-check-square" aria-hidden="true"></i>
                    <i data-ng-show="!yourLoopfilterOn" class="fa fa-square-o" aria-hidden="true"></i>
                    <a data-ng-class="{ 'underline' : yourLoopfilterOn }" data-ng-click="activateYourLoopFilter({{ Auth::user()->id }})">Your loops</a>
                </li>
            @endif
            <li class="sub-title">
                <p>Category</p>
            </li>
            <li>
                <i data-ng-click="categoryBlues = !categoryBlues; includeCategory('Blues')" data-ng-show="categoryBlues" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryBlues = !categoryBlues; includeCategory('Blues')" data-ng-show="!categoryBlues" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryBlues = !categoryBlues; includeCategory('Blues')" data-ng-class="{ 'underline' : categoryBlues }">Blues</a>
            </li>
            <li>
                <i data-ng-click="categoryPop = !categoryPop; includeCategory('Pop')" data-ng-show="categoryPop" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryPop = !categoryPop; includeCategory('Pop')" data-ng-show="!categoryPop" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryPop = !categoryPop; includeCategory('Pop')" data-ng-class="{ 'underline' : categoryPop }">Pop</a>
            </li>
            <li>
                <i data-ng-click="categoryRock = !categoryRock; includeCategory('Rock')" data-ng-show="categoryRock" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryRock = !categoryRock; includeCategory('Rock')" data-ng-show="!categoryRock" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryRock = !categoryRock; includeCategory('Rock')" data-ng-class="{ 'underline' : categoryRock }">Rock</a>
            </li>
            <li>
                <i data-ng-click="categoryCountry = !categoryCountry; includeCategory('Country')" data-ng-show="categoryCountry" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryCountry = !categoryCountry; includeCategory('Country')" data-ng-show="!categoryCountry" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryCountry = !categoryCountry; includeCategory('Country')" data-ng-class="{ 'underline' : categoryCountry }">Country</a>
            </li>
            <li>
                <i data-ng-click="categoryFlamenco = !categoryFlamenco; includeCategory('Flamenco')" data-ng-show="categoryFlamenco" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryFlamenco = !categoryFlamenco; includeCategory('Flamenco')" data-ng-show="!categoryFlamenco" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryFlamenco = !categoryFlamenco; includeCategory('Flamenco')" data-ng-class="{ 'underline' : categoryFlamenco }">Flamenco</a>
            </li>
            <li>
                <i data-ng-click="categoryAlternative = !categoryAlternative; includeCategory('Alternative')" data-ng-show="categoryAlternative" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryAlternative = !categoryAlternative; includeCategory('Alternative')" data-ng-show="!categoryAlternative" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryAlternative = !categoryAlternative; includeCategory('Alternative')" data-ng-class="{ 'underline' : categoryAlternative }">Alternative</a>
            </li>
            <li>
                <i data-ng-click="categoryPunk = !categoryPunk; includeCategory('Punk')" data-ng-show="categoryPunk" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryPunk = !categoryPunk; includeCategory('Punk')" data-ng-show="!categoryPunk" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryPunk = !categoryPunk; includeCategory('Punk')" data-ng-class="{ 'underline' : categoryPunk }">Punk</a>
            </li>
            <li>
                <i data-ng-click="categoryMetal = !categoryMetal; includeCategory('Metal')" data-ng-show="categoryMetal" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryMetal = !categoryMetal; includeCategory('Metal')" data-ng-show="!categoryMetal" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryMetal = !categoryMetal; includeCategory('Metal')" data-ng-class="{ 'underline' : categoryMetal }">Metal</a>
            </li>
            <li>
                <i data-ng-click="categoryFolk = !categoryFolk; includeCategory('Folk')" data-ng-show="categoryFolk" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryFolk = !categoryFolk; includeCategory('Folk')" data-ng-show="!categoryFolk" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryFolk = !categoryFolk; includeCategory('Folk')" data-ng-class="{ 'underline' : categoryFolk }">Folk</a>
            </li>
            <li>
                <i data-ng-click="categoryClassic = !categoryClassic; includeCategory('Classic')" data-ng-show="categoryClassic" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryClassic = !categoryClassic; includeCategory('Classic')" data-ng-show="!categoryClassic" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryClassic = !categoryClassic; includeCategory('Classic')" data-ng-class="{ 'underline' : categoryClassic }">Classic</a>
            </li>
            <li>
                <i data-ng-click="categoryReggae = !categoryReggae; includeCategory('Reggae')" data-ng-show="categoryReggae" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryReggae = !categoryReggae; includeCategory('Reggae')" data-ng-show="!categoryReggae" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryReggae = !categoryReggae; includeCategory('Reggae')" data-ng-class="{ 'underline' : categoryReggae }">Reggae</a>
            </li>
            <li>
                <i data-ng-click="categoryFunk = !categoryFunk; includeCategory('Funk')" data-ng-show="categoryFunk" class="fa fa-check-square" aria-hidden="true"></i>
                <i data-ng-click="categoryFunk = !categoryFunk; includeCategory('Funk')" data-ng-show="!categoryFunk" class="fa fa-square-o" aria-hidden="true"></i>
                <a data-ng-click="categoryFunk = !categoryFunk; includeCategory('Funk')" data-ng-class="{ 'underline' : categoryFunk }">Funk</a>
            </li>
        </ul>
        <div class="slide-up-toggle" data-ng-click="sidebarUp = !sidebarUp">
        	<span data-ng-show="!sidebarUp">Hide filters</span>
        	<span data-ng-show="sidebarUp">Show filters</span>
           	<i class="fa" data-ng-class="{ 'fa-arrow-up' : !sidebarUp, 'fa-eye' : sidebarUp }"></i>
        </div>
    </div>
    <div class="col-xs-12 col-sm-10 loops">
    	<div class="row">
			<div class="col-xs-12 col-sm-6 col-lg-4" data-ng-controller="LoopController" data-ng-repeat="loop in loops | filter:categoryFilter | filter:(!filterLoopsUserId ? '' : yourLoopFilter) | orderBy:(!mostRecent ? '' : '-created_at') | limitTo:loopLimit as filtered_result" data-ng-init="isFavourite=loop.isFavourite">
				<div class="row loop-box" data-ng-class="{ 'favourite' : isFavourite }">
				  	<div class="col-xs-2">
				    	<a class="play-button" data-ng-click="playLoop(loop, $event)">
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
                                <img class="rank-icon" data-ng-src="images/rankIcons/rank_<% loop.user.rank %>.png" alt="This users rank medal"> <% loop.user.rating %>
                            </p>
				    	</div>
				  	</div>
                    @if(Auth::check())
    				  	<div class="favourite">
    				  			<i class="fa" data-ng-class="{ 'fa-star active' : isFavourite, 'fa-star-o' : !isFavourite }" data-ng-click="favourite(loop.id)"></i>
    				  	</div>
                    @else
    				  	<div class="favourite">
    				  			<i class="fa fa-star-o" title="Login to favourite this guitar loop!" data-toggle="tooltip" data-placement="top" tooltip></i>
    				  	</div>
                    @endif
				</div>
				<div class="labels">
					<p data-ng-repeat="tag in loop.tags">
                        <span class="label"><i class="fa fa-tag"></i> <a href="/tag/<% tag.name %>"><% tag.name %></a></span></p>
				</div>
			</div>
            <div data-ng-show="filtered_result <= 0" class="col-xs-12" data-ng-controller="AlertController">
                <div class="info-box info" data-ng-hide="hidden" data-ng-class="{fade: startFade}">
                    <p>
                        <i class="fa fa-info alert-type-icon"></i>There are <strong>no loops</strong> with these filters available!
                        @if(Auth::check())
                            <a class="black-link" href="{{ route('station') }}">Start adding more loops right now!</a>
                        @endif
                        <i data-ng-click="closeAlert()" class="fa fa-times close-button"></i>
                    </p>
                </div>
            </div>
            <div data-ng-show="loops.length > 9 && loopLimit <= filtered_result.length" class="col-xs-12">
                <button class="basic-button load-more-button" href="" data-ng-click="loopLimit = loopLimit + 3">Load more</button>
            </div>
		</div>
    </div>
</section>

@stop