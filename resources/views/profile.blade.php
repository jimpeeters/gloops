@extends('layouts.master')

@section('title', 'Your Guitar Loops Account')

@section('content')

<div class="profile">

	<div class="title-section">
		<h1>PROFILE</h1>
	</div>

	@if (session()->has('success'))
        <div class="col-xs-12" ng-controller="AlertController">
        	<div class="info-box success" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-check alert-type-icon"></i>{{ Session::get('success') }}
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
        </div>
    @endif

	@if(Auth::check())

		<div class="col-xs-12">
			<center>
				<div class="profile-picture" style="background-image: url({{ Auth::user()->avatar }})" title="Edit your profile picture" data-toggle="tooltip" data-placement="left" tooltip>
					<img class="profile-rank-icon" src="images/rankIcons/rank_{{ Auth::user()->rank }}.png" alt="This users rank {{ Auth::user()->rank }} medal">
					<a class="profile-edit" href=""><i class="fa fa-pencil"></i></a>
				</div>
				<h2 class="profile-name">{{ Auth::user()->name }}</h2>
				<ul class="profile-rank" title="Gain more rating to rank up" data-toggle="tooltip" data-placement="left" tooltip>
					<li class="filled"></li>
					@if(Auth::user()->rank > 1 && Auth::user()->rank < 3)
						<li class="filled"></li>
					@else
						<li></li>
					@endif

					@if(Auth::user()->rank > 2 && Auth::user()->rank < 4)
						<li class="filled"></li>
					@else
						<li></li>
					@endif

					@if(Auth::user()->rank > 3 && Auth::user()->rank < 5)
						<li class="filled"></li>
					@else
						<li></li>
					@endif

					@if(Auth::user()->rank > 4)
						<li class="filled"></li>
					@else
						<li></li>
					@endif
					
				</ul>
				<ul class="profile-rank-info">
					<li>
						<img class="profile-rank-icon" src="images/rankIcons/rank_1.png" alt="Rank 1 icon">
						<p>0</p>
					</li>
					<li>
						<img class="profile-rank-icon" src="images/rankIcons/rank_2.png" alt="Rank 2 icon">
						<p>20</p>
					</li>
					<li>
						<img class="profile-rank-icon" src="images/rankIcons/rank_3.png" alt="Rank 3 icon">
						<p>50</p>
					</li>
					<li>
						<img class="profile-rank-icon" src="images/rankIcons/rank_4.png" alt="Rank 4 icon">
						<p>100</p>
					</li>
					<li>
						<img class="profile-rank-icon" src="images/rankIcons/rank_5.png" alt="Rank 5 icon">
						<p>500</p>
					</li>
				</ul>
			</center>
		</div>
		

		<div class="col-xs-12">
			<h2 class="block-title"><i class="fa fa-star"></i> Your favourite loops</i></h2>
		</div>

		<div ng-controller="ProfileController">

			<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in favouriteLoops | limitTo:loopLimit track by loop.id" ng-init="isFavourite=loop.isFavourite">

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
				    		<p class="user-name"><% loop.user.name %></p>
	                        <p class="rank-text">
	                            <img class="rank-icon" src="images/rankIcons/rank_<% loop.user.rank %>.png" alt="This users rank medal"> <% loop.user.rating %>
	                        </p>
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
						<i class="fa fa-info alert-type-icon"></i>You currently don't have anny <strong>favourite guitar loops</strong>.
						<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
					</p>
				</div>
			</div>

		</div>

		<div class="col-xs-12">
			<h2 class="block-title"><i class="fa fa-pencil"></i> Edit your profile</i></h2>
		</div>

		@if (count($errors) > 0)
		    <div class="col-xs-12" ng-controller="AlertController">
		    	<div class="info-box error" ng-hide="hidden" ng-class="{fade: startFade}">
		    		@foreach ($errors->all() as $error)
						<p>
							<i class="fa fa-times alert-type-icon"></i>{{ $error }}
							<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
						</p>
					@endforeach
				</div>
		    </div>
		@endif

		<div class="col-xs-12 col-md-6">
			{!! Form::open(array('route' => 'updateUser', 'method' => 'POST','files' => true)) !!}
				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'You may choose to type a new name')) !!}
				</div>
				<div class="form-group">
				    <div class="custom-file-upload">
					    {!! Form::label('file', 'Profile picture') !!}
					    <input type="file" id="file" name="file" multiple />
					</div>
				</div>

				<button type="submit" class="basic-button">Edit</button>
			{!! Form::close() !!}	
		</div>


	@else

		@include('snippets.login')

	@endif

</div>

@stop