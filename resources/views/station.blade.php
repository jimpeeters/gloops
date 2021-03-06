@extends('layouts.master')

@section('title', 'Loop station')

@section('content')

<div class="station" data-ng-controller="StationController">

	@if(Auth::check())

		@if (session()->has('success'))
	        <div class="col-xs-12" data-ng-controller="AlertController">
	        	<div class="info-box success" data-ng-hide="hidden" data-ng-class="{fade: startFade}">
					<p>
						<i class="fa fa-check alert-type-icon"></i>{{ Session::get('success') }}
						<i data-ng-click="closeAlert()" class="fa fa-times close-button"></i>
					</p>
				</div>
	        </div>
	    @endif

	    <section class="your-loops scrollable-section" data-section-title="Your loops" data-ng-init="getUserLoops()">

			<div class="col-xs-12">
				<h2 class="title">Your loops</h2>
			</div>

			<div class="col-xs-12 col-sm-6 col-lg-4" data-ng-controller="LoopController" data-ng-repeat="loop in loops | limitTo:loopLimit | orderBy:'-created_at' track by loop.id">
				<!-- Confirmation modal delete -->
				<div id="confirmationModal<% loop.id %>" class="confirmation-modal delete-confirm modal" role="dialog">
				  	<div class="modal-dialog">
					    <div class="modal-content">
						    <div class="modal-header">
						    	<h2>Confirm</h2>
						      	<button type="button" class="close" data-dismiss="modal">&times;</button>
						    </div>
						    <div class="modal-body">
						    	<h4>Are you sure you want to delete '<% loop.name %>' ?</h4>
								<a class="basic-button" href="/loop/delete/<% loop.id %>">Yes</a>
								<button class="basic-button" href="" data-dismiss="modal">Cancel</button>
						  	</div>
						</div>
				  	</div>
				</div>
				<!-- /Confirmation modal delete-->
				<div class="row loop-box" data-ng-class="{ 'favourite' : isFavourite, 'deletable' : enableDeleting, 'editable' : enableEditing }" data-ng-init="isFavourite=loop.isFavourite">				
					<a class="btn-floating waves-effect waves-light btn-small delete-button" data-toggle="modal" data-target="#confirmationModal<% loop.id %>" data-ng-show="enableDeleting">
			    		<i class="fa fa-trash"></i> 
			    	</a>

			    	<a class="btn-floating waves-effect waves-light btn-small edit-button" href="/station/edit/<% loop.id %>" data-ng-show="enableEditing">
			    		<i class="fa fa-pencil"></i> 
			    	</a>

				  	<div class="col-xs-2 loopbox-section">
				    	<a class="play-button" data-ng-click="playLoop(loop, $event)">
				      		<i id="play-button-<% loop.id %>" class="fa fa-play"></i>
				   		</a>
					    <div class="gapless-block" id="gapless_<% loop.id %>"></div>
				  	</div>
				  	<div class="col-xs-7 loopbox-section">
				    	<a data-ng-show="!enableDeleting && !enableEditing" href="/loop/name/<% loop.name %>" class="loop-link">
				    		<h3 class="loop-title"><% loop.name %></h3>
				    	</a>
				    	<a data-ng-show="enableDeleting || enableEditing" class="loop-link disabled-link">
				    		<h3 class="loop-title"><% loop.name %></h3>
				    	</a>
				    	<p class="duration" id="gapless_<% loop.id %>_duration">0:00</p>
				    	<p class="category"><i class="fa fa-music"></i> <% loop.category.name %></p>
				  	</div>
				  	<div class="col-xs-3 loopbox-section">
				    	<div class="user-info">
				    		<div class="user-avatar" style="background-image: url(<% loop.user.avatar %>)"></div>
				    		<p class="user-name"><% loop.user.name %></p>
							<p class="rank-text">
								<img class="rank-icon" data-ng-src="/images/rankIcons/rank_<% loop.user.rank %>.png" alt="This users rank medal"> <% loop.user.rating %>
							</p>
				    	</div>
				  	</div>
					<div class="favourite">
					  	<i class="fa" data-ng-class="{ 'fa-star active' : isFavourite, 'fa-star-o' : !isFavourite }" data-ng-click="favourite(loop.id)"></i>
					</div>
				</div>
				<div class="labels">
					<p data-ng-repeat="tag in loop.tags">
						<span class="label">
							<i class="fa fa-tag"></i> <a href="/tag/<% tag.name %>"><% tag.name %></a>
						</span>
					</p>
				</div>
			</div>
			<div data-ng-show="loops.length > 0" class="col-xs-12 action-buttons">
				<button data-ng-show="loops.length > 9" class="basic-button load-more-button" data-ng-class="{ hide: loopLimit >= loops.length }" data-ng-click="loopLimit = loopLimit + 3" href="">Load more</button>
				<div class="button-wrapper">
					<a class="delete btn-floating waves-effect waves-light btn-small" data-ng-click="enableDeleting = !enableDeleting; enableEditing = false">
			    		<i data-ng-show="enableDeleting" class="fa fa-times"></i>
			    		<i data-ng-show="!enableDeleting" class="fa fa-trash"></i> 
			    	</a>
			    </div>
			    <div class="button-wrapper">
					<a class="edit btn-floating waves-effect waves-light btn-small" data-ng-click="enableEditing = !enableEditing; enableDeleting = false">
			    		<i data-ng-show="enableEditing" class="fa fa-times"></i>
			    		<i data-ng-show="!enableEditing" class="fa fa-pencil"></i> 
			    	</a>
		    	</div>
			</div>

			<div data-ng-show="loops.length === 0" class="col-xs-12" data-ng-controller="AlertController">
				<div class="info-box info" data-ng-hide="hidden" data-ng-class="{fade: startFade}">
					<p>
						<i class="fa fa-info alert-type-icon"></i>You currently have no <strong>guitar loops</strong>.
						<i data-ng-click="closeAlert()" class="fa fa-times close-button"></i>
					</p>
				</div>
			</div>
		</section>

		<section class="upload-section scrollable-section" data-section-title="Upload a loop" id="upload-section">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3">
				<div id="tutorialModal1" class="modal tutorial-modal" role="dialog">
				  	<div class="modal-dialog">
					    <div class="modal-content">
						    <div class="modal-header">
						    	<h2>Tutorial video</h2>
						      	<button type="button" class="close" data-dismiss="modal">&times;</button>
						    </div>
						    <div class="modal-body">
						    	<h4>How to make and upload loops?</h4>
								<iframe src="https://www.youtube.com/embed/TwhiN12jhdo" frameborder="0" allowfullscreen></iframe>
						  	</div>
						</div>
				  	</div>
				</div>
				<h2 class="title">
					Start uploading 
					<a class="help-button btn-floating waves-effect waves-light btn-small" data-toggle="modal" data-target="#tutorialModal1">
			    		<i class="fa fa-question"></i>
			    	</a>
			    </h2>

				@if (count($errors) > 0)
				    <div data-ng-controller="AlertController">
				    	<div class="info-box error" data-ng-hide="hidden" data-ng-class="{fade: startFade}">
				    		@foreach ($errors->all() as $key => $error)
								<p>
									<i class="fa fa-times alert-type-icon"></i>{{ $error }}
									@if($key == 0)
										<i data-ng-click="closeAlert()" class="fa fa-times close-button"></i>
									@endif
								</p>
							@endforeach
						</div>
				    </div>
				@endif

				{!! Form::open(array('route' => 'upload', 'method' => 'POST','files' => true, 'enctype' => 'multipart/form-data')) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name *') !!}
						<input 
							placeholder="Name of your loop"
					    	type="text" 
					    	name="name"
					    	value="{{ old('name') }}" 
					    	data-ng-model="name"
							data-ng-model-options='{ debounce: 300 }'
							class="form-control"
							data-ng-class="{ enabled : nameIsValid }"
							data-ng-change="checkName(name)"
							id="loopName"
							required>
					</div>

					<div class="form-group file-upload">
					    <div class="custom-file-upload">
						    {!! Form::label('file', 'Mp3 File *') !!}
						    <input type="file" id="file" name="mp3" data-ng-model="file" onchange="angular.element(this).scope().checkFile()"/>
						</div>
						<a class="btn-floating waves-effect waves-light btn-small small-record-button" href="" data-toggle="modal" data-target="#recordModal"><i class="fa fa-microphone"></i></a>
					</div>

		    		<div class="form-group">
						{!! Form::label('Category *') !!}
						<select name="category" class="form-control chosen-select-dropdown" data-placeholder="Choose a Category" data-ng-model="category" data-ng-change="checkCategory()">
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
						<p class="tip-label">(Adding <strong>tags</strong> to your loop makes them easier to find for other people!)</p>
		    		</div>
	                
					<button data-ng-disabled="!uploadEnabled" data-ng-class="{ disabled : !uploadEnabled}" type="submit" class="basic-button upload-button">Upload</button>
				{!! Form::close() !!}	

				<h2 class="title record-title">Or recording</h2>

				<a class="record-button btn-floating waves-effect waves-light btn-large" href="" data-toggle="modal" data-target="#recordModal"><i class="fa fa-microphone"></i></a>
				@include('record')

			</div>
		</section>

	@else

		@include('snippets.login')

	@endif

	@include('sections.tutorial')


</div>

@stop
