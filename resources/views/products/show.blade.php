@extends('layouts.app', ['pageTitle' => $product->name])

@section('content')
<div class="section">
	<div class="cols">
		<div class="col col-6">
			<img src="https://unsplash.it/500/500?image=1060" class="hero-image">
		</div>

		<div class="col col-6">
			<h1 class="section__title section__title--big">{{ $product->name }}</h1>
			{{--
			@if(Auth::check() && $product->owner_id == Auth::user()->id)
			<small>{{ link_to_route('products.edit', 'Edit', [$product->slug]) }}</small>
			@endif
			--}}
			<p class="section__subtitle">{{ $product->category->name }} - {{ $product->subcategory->name }}</p>

			<p class="text text--big">{{ $product->description }}</p>
			<p class="text">offered by {{ $product->owner->name }}</p>
			<p class="text">ends in <span data-ends="{{ $product->date_of_end }}">{{ Carbon\Carbon::parse($product->date_of_end)->diffForHumans() }}</span></p>
		</div>
	</div>
</div>

<div class="section">
	<h2 class="section__title">Make a bid</h2>
	<p class="section__subtitle">Trade for an existing offer or create a new one</p>
	<div class="section__line"></div>

	<div class="cols">
		<div class="col col-6">
			<p class="text">Do you want to trade for something you have already been offering?</p>
			<p class="text">Just select your existing offer from the select box. It's easy as that!</p>
			<select>
				<option>Offer nr. 1</option>
				<option>Offer nr. 2</option>
				<option>Offer nr. 3</option>
			</select>
			<button class="button">Exchange</button>
		</div>

		<div class="col col-6">
			<p class="text">Alternatively, you can create a brand new offer.</p>
			<p class="text">You will have the option to make this offer public in case this trade fails.</p>
			<p class="text">Lorem ipsum.</p>
			<p class="text">Lorem ipsum.</p>
			<button class="button">Make a new offer</button>
		</div>
	</div>
</div>

<div class="section" id="comments">
	<h2 class="section__title">Comments</h2>
	<p class="section__subtitle">Feel free to ask</p>
	<div class="section__line"></div>

	@include('products.comments', ['comments' => $product->comments])

	@if(Auth::check())
	<textarea id="comment-text" placeholder="Write your comment..." rows="5" data-id="{{ $product->id }}" data-check="{{ bcrypt($product->slug) }}"></textarea>
	<button class="button" id="add-comment">Submit</a>
{{--	@else
		<p class="text">Please login to comment</p>
--}}
	@endif
</div>

<div class="section">
	<h2 class="section__title">Related products</h2>
	<p class="section__subtitle">You might be interested in</p>
	<div class="section__line"></div>

	<div class="cols">
		@each('products.thumbnail', $related, 'product')
	</div>
</div>
@endsection
