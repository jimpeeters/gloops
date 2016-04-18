@extends('layouts.master')

@section('title', 'Loop station')

@section('content')

<div class="station" ng-controller="StationController">
	<div class="title-section">
		<h1>STATION</h1>
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

	@if(!Auth::check())

		<div class="col-xs-12" ng-controller="AlertController">
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info alert-type-icon"></i>If you <a href="" data-toggle="modal" data-target="#registerModal">register</a> you have access to this page. Here you can manage your own loop <strong>station</strong> and listen to your own recorded or uploaded loops. 
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

	@endif

	<div class="col-xs-12">
		<h2 class="block-title"><i class="fa fa-play"></i> Your Loops</h2>
	</div>

	@if(Auth::check())
			<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in loops | limitTo:loopLimit track by loop.id" ng-init="isFavourite=loop.isFavourite">
				<!-- Confirmation modal -->
				<div id="confirmationModal<% loop.id %>" class="confirmation-modal modal" role="dialog">
				  	<div class="modal-dialog">
					    <div class="modal-content">
						    <div class="modal-header">
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
				<!-- /Confirmation modal -->
				<div class="row loop-box" ng-class="{ 'favourite' : isFavourite, 'deletable' : enableDeleting }">
					<a href="" data-toggle="modal" data-target="#confirmationModal<% loop.id %>" class="delete-button" ng-show="enableDeleting">
						<i class="fa fa-trash"></i>
					</a>
				  	<div class="col-xs-2 loopbox-section">
				    	<a class="play-button" ng-click="playLoop($event)">
				      		<i class="fa fa-play"></i>
				   		</a>
					    <audio class="music" controls preload loop>
					      	<source src="<% loop.loop_path %>" type="audio/mpeg">
					       	Your browser does not support the audio element.
					    </audio>
				  	</div>
				  	<div class="col-xs-7 loopbox-section">
				    	<h3 class="loop-title"><% loop.name %></h3>
				    	<p class="duration">0:00</p>
				    	<p class="category"><i class="fa fa-music"></i> <% loop.category.name %></p>
				  	</div>
				  	<div class="col-xs-3 loopbox-section">
				    	<div class="user-info">
				    		<div class="user-avatar" style="background-image: url(<% loop.user.avatar %>)"></div>
				    		<p class="user-name"><% loop.user.name %></p>
							<p class="rank-text">
								<img class="rank-icon" src="images/rankIcons/rank_<% loop.user.rank %>.png" alt="This users rank medal"> <% loop.user.rating %>
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
			<!-- Hier confirm message  -->

			<div ng-show="loops.length > 9" class="col-xs-12">
				<button class="basic-button load-more-button" ng-click="loopLimit = loopLimit + 3" href="">Load more</button>
			</div>

			<div ng-show="loops.length > 0" class="col-xs-12">
				<button class="basic-button remove-button" ng-click="enableDeleting = !enableDeleting" href="">
					<i ng-show="!enableDeleting" class="fa fa-trash"></i> 
					<span ng-show="!enableDeleting">Remove loops</span><span ng-show="enableDeleting">Cancel removal</span>
				</button>
			</div>

			<div ng-show="loops.length === 0" class="col-xs-12" ng-controller="AlertController">
				<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
					<p>
						<i class="fa fa-info alert-type-icon"></i>You currently have no <strong>guitar loops</strong>.
						<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
					</p>
				</div>
			</div>

	@else

		<div class="col-xs-12" ng-controller="AlertController">
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info alert-type-icon"></i>Here you will be able to <strong>manage</strong> all of your own guitar loops.
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

	@endif

	<div class="col-xs-12">
		<h2 class="block-title"><i class="fa fa-plus-square-o"></i> Add more loops</h2>
	</div>

	@if(Auth::check())

		<div class="col-xs-12 col-sm-6">
				<h4 class="block-title upload">Upload</h4>
				{!! Form::open(array('route' => 'upload', 'method' => 'POST','files' => true)) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name','',array('class' => 'form-control', 'required' => 'required')) !!}
					</div>

					<div class="form-group">
					    <div class="custom-file-upload">
						    {!! Form::label('file', 'File') !!}
						    <input type="file" id="file" name="file"/>
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('Tags') !!}
						<select size="5" name="tags[]" class="form-control chosen-select" data-placeholder="Add tags to this guitar loop..." multiple required>
							@foreach ($tags as $name)
								<option value="{{$name}}">{{$name}}</option>
							@endforeach
						</select>
		    		</div>

		    		<div class="form-group">
						{!! Form::label('Category') !!}
						<select name="category" class="form-control chosen-select-dropdown" data-placeholder="Choose a Category" required>
							<option value="">Choose a category</option>
							@foreach ($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
		    		</div>
	                
					<button type="submit" class="basic-button upload-button">Upload</button>
				{!! Form::close() !!}	
		</div>

		<div class="col-xs-12 col-sm-6">
			<h4 class="block-title">Record</h4>
			<!--     Record section      -->
		</div>

	@else

		<div class="col-xs-12 col-sm-6" ng-controller="AlertController">
			<h4 class="block-title upload">Upload</h4>
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info alert-type-icon"></i>Here you can <strong>upload</strong> your local guitar loops.
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6" ng-controller="AlertController">
			<h4 class="block-title">Record</h4>
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info alert-type-icon"></i>You can also record <strong>new</strong> guitar loops here!
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

	@endif

	@if(!Auth::check())
		@include('snippets.calltoaction.register')
	@endif

</div>

@stop
