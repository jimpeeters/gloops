@extends('layouts.master')

@section('title', 'Loop station')

@section('content')

<div class="station">
	@if(Auth::check())
		<!-- <img src="{{ Auth::user()->avatar }}" alt=""> -->
	@else
		<div class="col-md-12">
			<h4 class="station-title">To plug in your own guitar loops managing station you will need to register.</h4>
		</div>
	@endif
</div>

@stop