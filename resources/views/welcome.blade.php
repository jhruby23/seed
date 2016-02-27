@extends('layouts.app', ['pageTitle' => 'Welcome'])

@section('content')
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
	         	<div class="panel-heading">Welcome</div>
	         	<div class="panel-body">
						<p>Your Application's Landing Page.</p>
	         	</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
	         	<div class="panel-heading">Latest offers</div>
	         	<div class="panel-body">
	         	@foreach($latest as $offer)
         			@include('products.thumbnail', ['product' => $offer])
	         	@endforeach
	         	</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
	         	<div class="panel-heading">Trending offers</div>
	         	<div class="panel-body">
	         	@foreach($trending as $offer)	
	         		@include('products.thumbnail', ['product' => $offer])
	         	@endforeach
	         	</div>
				</div>
			</div>
		</div>
@endsection
