@extends('layouts.master')

@section('title', 'Loop station')

@section('content')

<div class="station" ng-controller="StationController">

	@if(Auth::check())

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

	    <section class="your-loops" ng-init="getUserLoops()">

			<div class="col-xs-12">
				<h2 class="title">Your loops</h2>
			</div>

			<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in loops | limitTo:loopLimit track by loop.id" ng-init="isFavourite=loop.isFavourite">
				<!-- Confirmation modal delete -->
				<div id="confirmationModal<% loop.id %>" class="confirmation-modal modal" role="dialog">
				  	<div class="modal-dialog">
					    <div class="modal-content">
						    <div class="modal-header">
						    	<h2>Delete</h2>
						      	<button type="button" class="close" data-dismiss="modal">&times;</button>
						    </div>
						    <div class="modal-body">
						    	<h4>Are you sure you want to delete '<% loop.name %>' ?</h4>
								<button class="basic-button" href="" ng-click="deleteLoop(loop)" data-dismiss="modal">Yes</button>
								<button class="basic-button" href="" data-dismiss="modal">No</button>
						  	</div>
						</div>
				  	</div>
				</div>
				<!-- /Confirmation modal delete-->
				<div class="row loop-box" ng-class="{ 'favourite' : isFavourite, 'deletable' : enableDeleting, 'editable' : enableEditing }">				
					<a class="btn-floating waves-effect waves-light btn-small red darken-2 delete-button" data-toggle="modal" data-target="#confirmationModal<% loop.id %>" ng-show="enableDeleting">
			    		<i class="fa fa-trash"></i> 
			    	</a>

			    	<a class="btn-floating waves-effect waves-light btn-small blue edit-button" href="/station/edit/<% loop.id %>" ng-show="enableEditing">
			    		<i class="fa fa-pencil"></i> 
			    	</a>

				  	<div class="col-xs-2 loopbox-section">
				    	<a class="play-button" ng-click="playLoop(loop, $event)">
				      		<i class="fa fa-play"></i>
				   		</a>
					    <div class="gapless-block" id="gapless_<% loop.id %>"></div>
				  	</div>
				  	<div class="col-xs-7 loopbox-section">
				    	<h3 class="loop-title"><% loop.name %></h3>
				    	<p class="duration" id="gapless_<% loop.id %>_duration">0:00</p>
				    	<p class="category"><i class="fa fa-music"></i> <% loop.category.name %></p>
				  	</div>
				  	<div class="col-xs-3 loopbox-section">
				    	<div class="user-info">
				    		<div class="user-avatar" style="background-image: url(<% loop.user.avatar %>)"></div>
				    		<p class="user-name"><% loop.user.name %></p>
							<p class="rank-text">
								<img class="rank-icon" ng-src="/images/rankIcons/rank_<% loop.user.rank %>.png" alt="This users rank medal"> <% loop.user.rating %>
							</p>
				    	</div>
				  	</div>
					<div class="favourite">
					  	<i class="fa" ng-class="{ 'fa-star active' : isFavourite, 'fa-star-o' : !isFavourite }" ng-click="favourite(loop.id);"></i>
					</div>
				</div>
				<div class="labels">
					<p ng-repeat="tag in loop.tags"><span class="label"><i class="fa fa-tag"></i> <% tag.name %></span></p>
				</div>
			</div>
			<div ng-show="loops.length > 0" class="col-xs-12 action-buttons">
				<button ng-show="loops.length > 9" class="basic-button load-more-button" ng-class="{ hide: loopLimit >= loops.length }" ng-click="loopLimit = loopLimit + 3" href="">Load more</button>
				<div class="button-wrapper">
					<a class="delete btn-floating waves-effect waves-light btn-small red darken-2" ng-click="enableDeleting = !enableDeleting; enableEditing = false">
			    		<i ng-show="enableDeleting" class="fa fa-times"></i>
			    		<i ng-show="!enableDeleting" class="fa fa-trash"></i> 
			    	</a>
			    </div>
			    <div class="button-wrapper">
					<a class="edit btn-floating waves-effect waves-light btn-small blue" ng-click="enableEditing = !enableEditing; enableDeleting = false">
			    		<i ng-show="enableEditing" class="fa fa-times"></i>
			    		<i ng-show="!enableEditing" class="fa fa-pencil"></i> 
			    	</a>
		    	</div>
			</div>

			<div ng-show="loops.length === 0" class="col-xs-12" ng-controller="AlertController">
				<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
					<p>
						<i class="fa fa-info alert-type-icon"></i>You currently have no <strong>guitar loops</strong>.
						<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
					</p>
				</div>
			</div>

		</section>

		<section class="upload-section">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3">
				<h2 class="title">Start uploading</h2>

				@if (count($errors) > 0)
				    <div ng-controller="AlertController">
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

				{!! Form::open(array('route' => 'upload', 'method' => 'POST','files' => true)) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						<input 
					    	type="text" 
					    	name="name"
					    	value="" 
					    	ng-model="name"
							ng-model-options='{ debounce: 300 }'
							class="form-control"
							ng-class="{ enabled : nameIsValid }"
							ng-change="checkName(name)"
							ng-placeholder="Name of your loop"
							required>
					</div>



					<div class="form-group">
					    <div class="custom-file-upload">
						    {!! Form::label('file', 'File') !!}
						    <input type="file" id="file" name="mp3" ng-model="file" onchange="angular.element(this).scope().checkFile()"/>
						</div>
					</div>

		    		<div class="form-group">
						{!! Form::label('Category') !!}
						<select name="category" class="form-control chosen-select-dropdown" data-placeholder="Choose a Category" ng-model="category" ng-change="checkCategory()">
							<option value="">Choose a category</option>
							@foreach ($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
		    		</div>

		    		<div class="form-group">
						{!! Form::label('Tags (optional)') !!}
						<select size="5" name="tags[]" class="form-control chosen-select" data-placeholder="Add tags to this guitar loop..." multiple>
							@foreach ($tags as $name)
								<option value="{{$name}}">{{$name}}</option>
							@endforeach
						</select>
		    		</div>
	                
					<button ng-disabled="!uploadEnabled" ng-class="{ disabled : !uploadEnabled}" type="submit" class="basic-button upload-button">Upload</button>
				{!! Form::close() !!}	

				<h2 class="title division-title"><span>Or recording</span></h2>

				<a class="record-button btn-floating waves-effect waves-light btn-large red" href="" data-toggle="modal" data-target="#recordModal"><i class="fa fa-microphone"></i></a>
				@include('record')

			</div>
		</section>

	@else

		@include('snippets.login')

	@endif

	@include('sections.tutorial')


</div>

@stop
