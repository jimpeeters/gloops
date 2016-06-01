@extends('layouts.master')

@section('title', 'Edit Loop')

@section('content')
<div class="station-edit">

	<div class="col-xs-12 col-md-offset-3 col-md-6">
		<h2 class="title">Edit this loop</h2>
	</div>

	@if (count($errors) > 0)
	    <div class="col-xs-12 col-lg-6 col-lg-offset-3" ng-controller="AlertController">
	    	<div class="info-box error" ng-hide="hidden" ng-class="{fade: startFade}">
	    		@foreach ($errors->all() as $key => $error)
					<p>
						<i class="fa fa-times alert-type-icon"></i>{{ $error }}
						@if($key == 0)
							<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
						@endif
					</p>
				@endforeach
			</div>
	    </div>
	@endif

	@if (session()->has('success'))
        <div class="col-xs-12 col-lg-6 col-lg-offset-3" ng-controller="AlertController">
        	<div class="info-box success" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-check alert-type-icon"></i>{{ Session::get('success') }}
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
        </div>
    @endif
	<div class="col-xs-12 col-md-offset-3 col-md-6" ng-controller="LoopController" ng-init="isFavourite={{ $loop->isFavourite }}">
		<div class="row loop-box" ng-class="{ 'favourite' : isFavourite }">
		  	<div class="col-xs-2 loopbox-section">
		    	<a class="play-button" ng-click="playLoop({{ $loop }}, $event)">
		      		<i class="fa fa-play"></i>
		   		</a>
			    <div class="gapless-block" id="gapless_{{ $loop->id }}"></div>
		  	</div>
		  	<div class="col-xs-7 loopbox-section">
		    	<h3 class="loop-title" ng-bind="name">{{ $loop->name }}</h3>
		    	<p class="duration" id="gapless_{{ $loop->id }}_duration">0:00</p>
		    	<p class="category"><i class="fa fa-music"></i> {{ $loop->category->name }}</p>
		  	</div>
		  	<div class="col-xs-3 loopbox-section">
		    	<div class="user-info">
		    		<div class="user-avatar" style="background-image: url({{ $loop->user->avatar }})"></div>
		    		<p class="user-name">{{ $loop->user->name }}</p>
					<p class="rank-text">
						<img class="rank-icon" ng-src="/images/rankIcons/rank_{{ $loop->user->rank }}.png" alt="This users rank medal"> {{ $loop->user->rating }}
					</p>
		    	</div>
		  	</div>
			<div class="favourite">
			  	<i class="fa" ng-class="{ 'fa-star active' : isFavourite, 'fa-star-o' : !isFavourite }" ng-click="favourite({{ $loop->id }});"></i>
			</div>
		</div>
		<div class="labels">
			@foreach($loop->tags as $tag)
				<p><span class="label"><i class="fa fa-tag"></i> {{ $tag->name }}</span></p>
			@endforeach
		</div>
	</div>

	<div class="col-xs-12 col-md-offset-3 col-md-6">
		{!! Form::open(array('route' => 'edit', 'method' => 'POST','files' => true)) !!}
			<div class="form-group">
				{!! Form::label('name', 'Name') !!}
				<input class="form-control" type="text" ng-model="name" ng-init="name='{{ $loop->name }}'" name="name" value="{{ $loop->name }}" id="name" required>
			</div>

			<div class="form-group">
			    <div class="custom-file-upload">
				    {!! Form::label('file', 'File') !!}
				    <input type="file" id="file" name="file"/>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('Category') !!}
				<select name="category" class="form-control chosen-select-dropdown" data-placeholder="Choose a Category" required>
					<option value="">Choose a category</option>
					@foreach ($categories as $category)
						@if($category->name == $loop->category->name)
							<option value="{{$category->id}}" selected>{{$category->name}}</option>
						@else
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				{!! Form::label('Tags (optional)') !!}
				<select size="5" name="tags[]" class="form-control chosen-select" data-placeholder="Add tags to this guitar loop..." multiple required>
					@foreach ($tags as $name)
						@foreach($loop->tags as $looptag)
							@if($name == $looptag->name)
								<option value="{{$name}}" selected>{{$name}}</option>
								<?php continue 2; ?>
							@endif
						@endforeach
						<option value="{{$name}}">{{$name}}</option>
					@endforeach
				</select>
			</div>

			<input type="hidden" name="id" value="{{ $loop->id }}">
		    
			<button type="submit" class="basic-button upload-button">Edit this loop</button>
		{!! Form::close() !!}
	</div>
</div>

@stop