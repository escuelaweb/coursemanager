@extends('layouts.master')

@section('title') Dev Academy @stop

@section('stylesheets')
	@parent
	<link rel="stylesheet" href="{{asset('css/home.css')}}">
@stop

@section('main')
	<article class="jumbotron">
		<h1>Dev Academy</h1>
		<h2>Institución dedicada a la enseñanza de tecnologías para el desarrollo web.</h2>
		<p>
			<a class="btn btn-primary btn-lg" role="button">Learn more</a>
		</p>
	</article>
@stop