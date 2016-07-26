@extends('layouts.app', ['pageTitle' => $product->name])

@section('content')
<div class="section">
	<h1 class="section__title section__title--big">{{ $product->name }}</h1>
{{--
	@if(Auth::check() && $product->owner_id == Auth::user()->id)
	<small>{{ link_to_route('products.edit', 'Edit', [$product->slug]) }}</small>
	@endif
--}}
	<p class="section__subtitle section__subtitle--no-underline">{{ $product->category->name }} - {{ $product->subcategory->name }}</p>

	<p class="text--big">{{ $product->description }}</p>
	<p>offered by {{ $product->owner->name }}</p>
	<p>ends in <span data-ends="{{ $product->date_of_end }}">{{ Carbon\Carbon::parse($product->date_of_end)->diffForHumans() }}</span></p>
</div>

<div class="section">
	<h2 class="section__title">Make a bid</h2>
	<p class="section__subtitle">Trade for an existing offer or create a new one</p>

	<div class="col col-6">
		<p>Do you want to trade for something you have already been offering?</p>
		<p>Just select your existing offer from the select box. It's easy as that!</p>
		<select>
			<option>Offer nr. 1</option>
			<option>Offer nr. 2</option>
			<option>Offer nr. 3</option>
		</select>
		<button class="button">Exchange</button>
	</div>

	<div class="col col-6">
		<p>Alternatively, you can create a brand new offer.</p>
		<p>You will have the option to make this offer public in case this trade fails.</p>
		<p>Lorem ipsum.</p>
		<p>Lorem ipsum.</p>
		<button class="button">Make a new offer</button>
	</div>
</div>

<div class="section">
	<h2 class="section__title">Comments</h2>
	<p class="section__subtitle">Feel free to ask</p>

	<div id="comments">
		@include('products.comments', ['comments' => $product->comments])
	</div>

	@if(Auth::check())
	<textarea id="comment-text" placeholder="Write your comment..." rows="5" data-id="{{ $product->id }}" data-check="{{ bcrypt($product->slug) }}"></textarea>
	<a href="#" class="button" id="add-comment">Submit</a>
	@else
		<p>Please login to comment</p>
	@endif
</div>

<div class="section">
	<h2 class="section__title">Related products</h2>
	<p class="section__subtitle">You might be interested in</p>

	@foreach($related as $offer)
		@include('products.thumbnail', ['product' => $offer])
	@endforeach
</div>
@endsection
