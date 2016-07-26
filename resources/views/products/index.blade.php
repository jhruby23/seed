@extends('layouts.app', ['pageTitle' => 'My products'])

@section('content')
<div class="section">
	<h2 class="section__title">My products</h2>
	<p class="section__subtitle"></p>
	<div class="section__line"></div>

	<div class="cols">
		@each('products.thumbnail', $products, 'product')
	</div>
</div>
@endsection
