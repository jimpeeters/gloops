@extends('layouts.master')

@section('title', 'Loop station')

@section('content')

<div class="station">
	<div class="title-section">
		<h1>STATION</h1>
	</div>

	@if (session()->has('success'))
        <div class="col-xs-12" ng-controller="AlertController">
        	<div class="info-box success" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-check"></i>{{ Session::get('success') }}
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
						<i class="fa fa-times"></i>{{ $error }}
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
					<i class="fa fa-info"></i>If you <a href="" data-toggle="modal" data-target="#registerModal">register</a> you have access to this page. Here you can manage your own loop <strong>station</strong> and listen to your own recorded or uploaded loops. 
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

	@endif

	<div class="col-xs-12">
		<h2>Your Loops</h2>
	</div>

	@if(Auth::check())

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
				  	<div class="col-xs-7">
				    	<h3 class="loop-title">{{$loop->name}}</h3>
				    	<p class="duration">0:09</p>
				    	<p class="category"><i class="fa fa-music"></i> {{$loop->category->name}}</p>
				  	</div>
				  	<div class="col-xs-3">
				    	<div class="user-info">
				    		<div class="user-avatar" style="background-image: url({{$loop->user->avatar}})"></div>
				    		<span class="user-name">{{$loop->user->name}}</span>
							<span class="reputation-count"><i class="fa fa-bolt"></i> 53</span>
				    	</div>
				  	</div>
				  	<div class="favourite">
				  		<i class="fa fa-star-o"></i>
				  	</div>
				</div>
				<div class="labels">
					@if(count($loop->tags) > 0)
						@foreach($loop->tags as $tag)
							<p><span class="label"><i class="fa fa-tag"></i> {{$tag->name}}</span></p>
					 	@endforeach
					@endif
				</div>
			
			</div>


		@endforeach

		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<a class="load-button" href="">
				<p>Load more <i class="fa fa-plus-circle"></i></p>
			</a>
		</div>

		<div class="col-xs-12">
			<hr>
		</div>

	@else

		<div class="col-xs-12" ng-controller="AlertController">
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info"></i>Here you will be able to <strong>manage</strong> all of your own guitar loops.
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

	@endif

	<div class="col-xs-12">
		<h2>Add more guitar loops</h2>
	</div>

	@if(Auth::check())

		<div class="col-xs-12 col-sm-6">
				<h3>Upload</h3>
				{!! Form::open(array('route' => 'upload', 'method' => 'POST','files' => true)) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name','',array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
					    {!! Form::label('File') !!}
					    {!! Form::file('file', null) !!}
					</div>

					<div class="form-group">
						{!! Form::label('Tags') !!}
						<select size="5" name="tags[]" class="form-control chosen-select" data-placeholder="Add tags to this guitar loop..." multiple >
							@foreach ($tags as $name)
								<option value="{{$name}}">{{$name}}</option>  <!-- Capitalize first letter -->
							@endforeach
						</select>
		    		</div>

		    		<div class="form-group">
						{!! Form::label('Category') !!}
						<select name="category" class="form-control chosen-select-dropdown" data-placeholder="Choose a Category">
							@foreach ($categories as $category)
								<option value="{{$category}}">{{$category}}</option>  <!-- Capitalize first letter -->
							@endforeach
						</select>
		    		</div>
	                
					<button href="" type="submit" class="ghost-button-red">Upload <i class="fa fa-plus-circle"></i></button>
				{!! Form::close() !!}	
				<hr>
		</div>

		<div class="col-xs-12 col-sm-6">
			<h3>Record</h3>
		</div>

	@else

		<div class="col-xs-12 col-sm-6" ng-controller="AlertController">
			<h3>Upload</h3>
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info"></i>Here you can <strong>upload</strong> your local guitar loops.
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6" ng-controller="AlertController">
			<h3>Record</h3>
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info"></i>You can also record <strong>new</strong> guitar loops here!
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

	@endif

	<div class="col-xs-12">
		<h2>Your favourite loops</h2>
	</div>

	@if(Auth::check())

	@else
		<div class="col-xs-12" ng-controller="AlertController">
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info"></i>You can browse other loops in the <a href="/library">library</a> and favourite them. Then you can listen to all your <strong>favourite</strong> guitar loops right here!
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

