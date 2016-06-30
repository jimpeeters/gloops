@extends('layouts.master')

@section('title', 'Administrator')

@section('content')

	@if(Auth::user()->id == 1)

	<div class="admin">
		<div class="col-xs-12">

		<h2 class="title">Admin section</h2>

			@if (session()->has('success'))
		        <div data-ng-controller="AlertController">
		        	<div class="info-box success" data-ng-hide="hidden" data-ng-class="{fade: startFade}">
						<p>
							<i class="fa fa-check alert-type-icon"></i>{{ Session::get('success') }}
							<i data-ng-click="closeAlert()" class="fa fa-times close-button"></i>
						</p>
					</div>
		        </div>
		    @endif

			<table class="striped user-overview">
		        <thead>
		          <tr>
		              <th>Name</th>
		              <th>Email</th>
		          	  <th>Picture</th>
		              <th>Loop amount</th>
		              <th>Reputation</th>
		              <th>Delete</th>
		          </tr>
		        </thead>

		        <tbody>
		        	@foreach($users as $user)
		        		<div id="confirmationModal{{ $user->id }}" class="confirmation-modal modal" role="dialog">
						  	<div class="modal-dialog">
							    <div class="modal-content">
								    <div class="modal-header">
								    	<h2>Delete</h2>
								      	<button type="button" class="close" data-dismiss="modal">&times;</button>
								    </div>
								    <div class="modal-body">
								    	<h4>Are you sure you want to delete '{{ $user->name }}' ?</h4>
										<a class="basic-button" href="/admin/user/delete/{{ $user->id }}">Yes</a>
										<button class="basic-button" data-dismiss="modal">No</button>
								  	</div>
								</div>
						  	</div>
						</div>
				        <tr>
				            <td>{{ $user->name }}</td>
				            <td>{{ $user->email }}</td>
				            <td class="user-avatar" style="background-image:url('{{$user->avatar}}')"></td>
				            <td>{{ count($user->loops) }}</td>
				            <td>{{ $user->rating }}</td>
				            <td>
				            	<a class="btn-floating waves-effect waves-light btn-small red darken-2" data-toggle="modal" data-target="#confirmationModal{{ $user->id }}">
			    					<i class="fa fa-trash"></i> 
			    				</a>
			    			</td>
				        </tr>
					@endforeach
		        </tbody>
		    </table>
		</div>
		<div class="col-xs-12">
			<h2 class="title">Loops of users</h2>
			@foreach($users as $user)

				@if($user->id != 1 && count($user->loops) > 0)

					<h2>{{ $user->name }}</h2>

					<table class="striped">
				        <thead>
				          <tr>
				              <th>Loopname</th>
				              <th>Loop</th>
				          	  <th>Favourites</th>
				              <th>Delete</th>
				          </tr>
				        </thead>

				        <tbody>
				        	@foreach($user->loops as $loop)
				        		<div id="confirmationModalLoop{{ $loop->id }}" class="confirmation-modal modal" role="dialog">
								  	<div class="modal-dialog">
									    <div class="modal-content">
										    <div class="modal-header">
										    	<h2>Delete</h2>
										      	<button type="button" class="close" data-dismiss="modal">&times;</button>
										    </div>
										    <div class="modal-body">
										    	<h4>Are you sure you want to delete '{{ $loop->name }}' ?</h4>
												<a class="basic-button" href="/admin/loop/delete/{{ $loop->id }}">Yes</a>
												<button class="basic-button" data-dismiss="modal">No</button>
										  	</div>
										</div>
								  	</div>
								</div>
						        <tr>
						            <td>{{ $loop->name }}</td>
						            <td>
						            	<div class="admin-loopbox" data-ng-controller="LoopController">
									    	<a class="play-button" data-ng-click="playLoop({{ $loop }}, $event)">
									      		<i id="play-button-{{ $loop->id }}" class="fa fa-play"></i>
									   		</a>
										    <div class="gapless-block" id="gapless_{{ $loop->id }}"></div>
										</div>
						            </td>
						            <td>{{ count($loop->favourites) }}</td>
						            <td>
						            	<a class="btn-floating waves-effect waves-light btn-small red darken-2" data-toggle="modal" data-target="#confirmationModalLoop{{ $loop->id }}">
					    					<i class="fa fa-trash"></i> 
					    				</a>
					    			</td>
						        </tr>
							@endforeach
				        </tbody>
				    </table>

				@endif

			@endforeach
		</div>
	</div>

	@else

		@include('errors.401')

	@endif

@stop