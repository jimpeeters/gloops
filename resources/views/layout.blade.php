@extends('layouts.master')

@section('title', 'layout')

@section('content')

<div id="content" class="section">
    <div class="inner">
        <div class="box">
            <h1 class="heading size-1 spacing-xl bordered">Titles</h1>
            <h1 class="heading size-1 weight-300 spacing-l">Heading size 1, weight 300, spacing-l</h1>
            <h1 class="heading size-2 weight-700 spacing-m">Heading size 2, weight 700, spacing-m</h1>
            <h1 class="heading size-3 weight-900 spacing-s text-upper">Heading size 3, weight 900, spacing-s, text-upper</h1>
            <h1 class="heading size-3 weight-900 spacing-s">Heading size 3, weight 900, spacing-s</h1>
        </div>

        <div class="box">
            <h1 class="heading size-1 spacing-xl bordered">Font-awesome</h1>
            <h1 class="heading size-1">
                <i class="fa fa-bolt"></i>
                <i class="fa fa-area-chart"></i>
            </h1>
        </div>
    </div>
</div>

@stop