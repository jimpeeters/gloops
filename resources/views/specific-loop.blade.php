@extends('layouts.master')

@section('title', 'Loop : ' . $loop->name)

@section('content')

<section class="specific-loop" data-ng-controller="SpecificLoopController" data-ng-init="getSpecificLoop({{ $loop->id }})">

	<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
		<h2 class="title">{{ $loop->name }}</h2>
	</div>
	<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4" data-ng-controller="LoopController">
			<div class="row loop-box" data-ng-class="{ 'favourite' : isFavourite }">
			  	<div class="col-xs-2">
			    	<a class="play-button" data-ng-click="playLoop(loop, $event)">
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
	                        <img class="rank-icon" data-ng-src="/images/rankIcons/rank_<% loop.user.rank %>.png" alt="This users rank medal"> <% loop.user.rating %>
	                    </p>
			    	</div>
			  	</div>
	            @if(Auth::check())
				  	<div class="favourite">
				  			<i class="fa" data-ng-class="{ 'fa-star active' : isFavourite, 'fa-star-o' : !isFavourite }" data-ng-click="favourite(loop.id);"></i>
				  	</div>
	            @else
				  	<div class="favourite">
				  			<i class="fa fa-star-o" title="Login to favourite this guitar loop!" data-toggle="tooltip" data-placement="top" tooltip></i>
				  	</div>
	            @endif
			</div>
			<div class="labels">
				<p data-ng-repeat="tag in loop.tags">
					<span class="label">
						<i class="fa fa-tag"></i> <a href="/tag/<% tag.name %>"><% tag.name %></a>
					</span>
				</p>
			</div>

			<center><p class="favourite-count"><i class="fa fa-star"></i>{{ count($loop->favourites) }}</p></center>

			<script language="javascript">
			    function fbshareCurrentPage()
			    {window.open("https://www.facebook.com/sharer/sharer.php?u="+escape(window.location.href)+"&t="+document.title, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false; }
			</script>
			<center><a target="_blank" class="btn-floating waves-effect waves-light btn-large facebook-button" href="javascript:fbshareCurrentPage()" target="_blank" alt="Share on Facebook">
		    	<i class="fa fa-facebook"></i> 
		    </a></center>
	</div>
</section>
@stop