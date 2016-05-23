@extends('layouts.master')

@section('title', 'Administrator')

@section('content')

	@if(Auth::user()->id == 1)

	<div class="admin">
		<div class="col-xs-12">

		<h2 class="title"><span>Admin section</span></h2>

			@if (session()->has('success'))
		        <div ng-controller="AlertController">
		        	<div class="info-box success" ng-hide="hidden" ng-class="{fade: startFade}">
						<p>
							<i class="fa fa-check alert-type-icon"></i>{{ Session::get('success') }}
							<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
						</p>
					</div>
		        </div>
		    @endif

			<table class="striped">
		        <thead>
		          <tr>
		              <th>Name</th>
		              <th>Email</th>
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
	</div>

	@else

		@include('errors.401')

	@endif

@stop