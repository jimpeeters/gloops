@extends('layouts.master')

@section('title', 'Loop station')

@section('content')

<div class="station">
	<div class="title-section">
		<h1>STATION</h1>
	</div>

	@if(Auth::check())
		<div class="col-xs-12">
			<h2>Your Loops</h2>
		</div>

		@foreach($loops as $loop)

			<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController">
				<div class="row loop-box">
				  	<div class="col-xs-2">
				    	<a class="play-button" ng-click="playLoop($event)">
				      		<i class="fa fa-play"></i>
				   		</a>
					    <audio class="music" controls loop>
					      	<source src="{{$loop->loop_path}}" type="audio/mpeg">
					       	Your browser does not support the audio element.
					    </audio>
				  	</div>
				  	<div class="col-xs-8">
				    	<h3 class="loop-title">{{$loop->name}}</h3>
				    	<span class="duration">0:09</span>
				    	<div class="user-info">
				    		<div class="user-avatar" style="background-image: url({{$loop->user->avatar}})"></div>
				    		<span class="user-name">{{$loop->user->name}}</span>
				    		<i class="fa fa-bolt"></i>
							<span class="reputation-count">53</span>
				    	</div>
				  	</div>
				  	<div class="col-xs-2">
				    	<i class="fa fa-star"></i>
				  	</div>
				</div>
			</div>

		@endforeach

		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<a class="load-button" href="">
				<p>Load more <i class="fa fa-plus-circle"></i></p>
			</a>
			<hr>
		</div>

		<div class="col-xs-12">
			<h2>Add more loops</h2>
		</div>

	@else
		<div class="col-xs-12">
			<div class="info-box">
				<p class="station-title"><i class="fa fa-plug"></i> To plug in your own guitar loops managing station you will need to register.</p>

			</div>
		</div>
	@endif
</div>

@stop