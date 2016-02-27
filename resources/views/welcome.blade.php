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
	         		<div class="col-md-4">
		         		<h2>{{ link_to_route('products.show', $offer->name, [$offer->id]) }}</h2>
		         		<p>{{ $offer->category->name }} - {{ $offer->subcategory->name }}</p>
		         		<p>{{ $offer->price }}</p>
	         		</div>
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
	         		<div class="col-md-4">
		         		<h2>{{ link_to_route('products.show', $offer->name, [$offer->id]) }}</h2>
		         		<p>{{ $offer->category->name }} - {{ $offer->subcategory->name }}</p>
							<p>{{ $offer->price }}</p>
	         		</div>
	         	@endforeach
	         	</div>
				</div>
			</div>
		</div>
@endsection
