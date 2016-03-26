@extends('layouts.master')

@section('title', 'Loop station')

@section('content')

<div class="station">
	<div class="title-section">
		<h1>YOUR STATION</h1>
	</div>

	@if(Auth::check())
		<!-- <img src="{{ Auth::user()->avatar }}" alt=""> -->
	@else
		<div class="col-md-12">
			<div class="info-box">
				<p class="station-title"><i class="fa fa-plug"></i> To plug in your own guitar loops managing station you will need to register.</p>
			</div>
		</div>
	@endif
</div>

@stop