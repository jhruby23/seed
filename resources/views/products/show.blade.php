@extends('layouts.app', ['pageTitle' => $product->name])

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
      	<div class="panel-heading">
      		{{ $product->name }}
      		@if(Auth::check() && $product->owner_id == Auth::user()->id)
				<small>{{ link_to_route('products.edit', 'Edit', [$product->slug]) }}</small>
				@endif
			</div>
      	<div class="panel-body">
      		<p>{{ $product->category->name }} - {{ $product->subcategory->name }}</p>
      		<p>{{ $product->description }}</p>
      		<p>offered by {{ $product->owner->name }}</p>
      		<p>ends in <span  data-ends="{{ $product->date_of_end }}">{{ Carbon\Carbon::parse($product->date_of_end)->diffForHumans() }}</span></p>
      	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
      	<div class="panel-heading">Make a bid</div>
      	<div class="panel-body">
      		<p>Choose from an existing offer</p>
      		<p>OR</p>
      		<p>Create a new offer</p>
      	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
      	<div class="panel-heading">Comments</div>
      	<div class="panel-body">
      		<h4>Feel free to ask</h4>
      		
      		<div id="comments">
      			@include('products.comments', ['comments' => $product->comments])
      		</div>
      		
      		@if(Auth::check())
				<div class="form-group">
					<div class="col-md-14">
						<textarea id="comment-text" class="form-control" placeholder="Write your comment..." rows="5" data-id="{{ $product->id }}" data-check="{{ bcrypt($product->slug) }}"></textarea>
					</div>
				</div>
				<a href="#" class="btn btn-primary" id="add-comment">Submit</a>
				@else
					<p>Please login to comment</p>
				@endif
      	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
      	<div class="panel-heading">Related products</div>
      	<div class="panel-body">
      		<h4>You might be interested in</h4>
      		
         	@foreach($related as $offer)
         		@include('products.thumbnail', ['product' => $offer])
         	@endforeach
      	</div>
		</div>
	</div>
</div>
@endsection
