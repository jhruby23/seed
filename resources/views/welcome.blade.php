@extends('layouts.app', ['pageTitle' => 'Welcome'])

@section('banner')
	<div class="banner">
		<p class="banner__title">Who are we?</p>
		<p class="banner__subtitle">Placeholder</p>
	</div>
@endsection

@section('content')
	<div class="section">
		<h2 class="section__title">Trending</h2>
		<p class="section__subtitle">Most viewed offers</p>
		<div class="section__line"></div>

		<div class="cols">
			@each('products.thumbnail', $trending, 'product')
		</div>
	</div>

	<div class="section">
		<h2 class="section__title">Latest</h2>
		<p class="section__subtitle">Most recent offers</p>
		<div class="section__line"></div>

		<div class="cols">
			@each('products.thumbnail', $latest, 'product')
		</div>
	</div>
@endsection
