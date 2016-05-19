@extends('layouts.master')

@section('title', '401 UNAUTHORIZED')

@section('content')

<div class="error">
	<div class="col-xs-12">
		<h1>401 - Unauthorized</h1>
		<p>You have no access to this page!</p>
		<p>Return to the <a href="{{ route('home') }}">homepage</a>.</p>
	</div>
</div>

@stop