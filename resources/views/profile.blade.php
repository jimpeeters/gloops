@extends('layouts.master')

@section('title', 'Your Guitar Loops Account')

@section('content')

<div class="profile" ng-controller="ProfileController">

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

	    <section class="profile-info">
			<div class="col-xs-12">
				<h2 class="title">Your profile</h2>
				<center>
					<div class="profile-picture" style="background-image: url({{ Auth::user()->avatar }})" title="Edit your profile picture" data-toggle="tooltip" data-placement="left" tooltip>
						<a class="btn-floating waves-effect waves-light btn-small red profile-edit" smooth-scroll target="edit-profile-form">
				    		<i class="fa fa-pencil"></i>
				    	</a>
					</div>
					<h2 class="profile-name">{{ Auth::user()->name }}</h2>
					<ul class="profile-rank" title="Gain more rating to rank up" data-toggle="tooltip" data-placement="left" tooltip>
						@if(Auth::user()->rating == 0)
							<li></li>
						@else
							<li class="filled"></li>
						@endif

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
							<img class="profile-rank-icon" src="/images/rankIcons/rank_1.png" alt="Rank 1 icon">
							<p>0</p>
						</li>
						<li>
							<img class="profile-rank-icon" src="/images/rankIcons/rank_2.png" alt="Rank 2 icon">
							<p>20</p>
						</li>
						<li>
							<img class="profile-rank-icon" src="/images/rankIcons/rank_3.png" alt="Rank 3 icon">
							<p>50</p>
						</li>
						<li>
							<img class="profile-rank-icon" src="/images/rankIcons/rank_4.png" alt="Rank 4 icon">
							<p>100</p>
						</li>
						<li>
							<img class="profile-rank-icon" src="/images/rankIcons/rank_5.png" alt="Rank 5 icon">
							<p>500</p>
						</li>
					</ul>
				</center>
			</div>
		</section>
		
		<section class="favourite-loops">
			<div class="col-xs-12">
				<h2 class="title">Your favourite loops</h2>
			</div>
			<i class="fa fa-heart heart-background"></i>
			<i class="fa fa-heart heart-background-2"></i>

			<div class="col-xs-12 col-sm-6 col-lg-4" ng-controller="LoopController" ng-repeat="loop in favouriteLoops | limitTo:loopLimit track by loop.id" ng-init="isFavourite=loop.isFavourite">

				<div class="row loop-box favourite">
				  	<div class="col-xs-2">
				    	<a class="play-button" ng-click="playLoop(loop, $event)">
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
	                            <img class="rank-icon" ng-src="/images/rankIcons/rank_<% loop.user.rank %>.png" alt="This users rank medal"> <% loop.user.rating %>
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

		</section>

		<section class="edit-loop">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3" id="edit-section">
				<h2 class="title">Edit your profile</h2>
				@if(count($errors) > 0)
				    <div ng-controller="AlertController">
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

				@if (session()->has('error'))
			        <div ng-controller="AlertController">
			        	<div class="info-box error" ng-hide="hidden" ng-class="{fade: startFade}">
							<p>
								<i class="fa fa-check alert-type-icon"></i>{{ Session::get('error') }}
								<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
							</p>
						</div>
			        </div>
			    @endif

				{!! Form::open(array('route' => 'updateUser','id' => 'edit-profile-form',  'method' => 'POST','files' => true)) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', Auth::user()->name , array('class' => 'form-control', 'placeholder' => 'You may choose to type a new name', 'required' => 'required')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Email') !!}
						{!! Form::text('email', Auth::user()->email ,array('class' => 'form-control','required' => 'required')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('oldpassword', 'Old password') !!}
						{!! Form::password('oldpassword', array('class' => 'form-control' , 'placeholder' => 'Old password')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('newpassword', 'New password') !!}
						{!! Form::password('newpassword', array('class' => 'form-control','placeholder' => 'New password')) !!}
					</div>
					<div class="form-group">
					    <div class="custom-file-upload">
						    {!! Form::label('file', 'Profile picture') !!}
						    <input type="file" id="file" name="image" placeholder="Upload an mp3 file" multiple />
						</div>
					</div>

					<input type="hidden" name="id" value="{{ Auth::user()->id }}">

					<button type="submit" class="basic-button">Edit</button>
				{!! Form::close() !!}	
			</div>
		</section>

		<section class="delete-account" ng-controller="DeleteAccountController">
			<div class="col-xs-12">
				<h2 class="title">Danger zone</h2>
				<p>Once you delete your account, there is no going back. Please be certain.</p>
				<a href="" class="basic-button" data-toggle="modal" data-target="#confirmationModalDeleteAccount">Delete your account</a>
			</div>

			<div id="confirmationModalDeleteAccount" class="confirmation-modal modal" role="dialog">
			  	<div class="modal-dialog">
				    <div class="modal-content">
					    <div class="modal-header">
					    	<h2>Delete</h2>
					      	<button type="button" class="close" data-dismiss="modal">&times;</button>
					    </div>
					    <div class="modal-body">
					    	<h4>Are you sure you want to delete your account ?</h4>
					    	<p>Type your <strong>email</strong> in the inputfield below.</p>
					    	<input 
						    	type="text" 
						    	value="" 
						    	ng-model="query"
								ng-model-options='{ debounce: 500 }'
								class="form-control"
								ng-change="checkAccountEmail(query,'{{ Auth::user()->email }}')"
								ng-placeholder="Enter your email here">

							<a class="basic-button" href="/delete/account/{{ Auth::user()->id }}" ng-class="{ 'disabled': !enableDelete }">Yes</a>
							<a class="basic-button" href="" data-dismiss="modal">No</a
					  	</div>
					</div>
			  	</div>
			</div>

		</section>
	@else

		@include('snippets.login')

	@endif
</div>

@stop