@extends('layouts.app', ['pageTitle' => $product->name])

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
      	<div class="panel-heading">{{ $product->name }}</div>
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
      		
      		@foreach($product->comments as $comment)
      		<div class="well">
      			<h4>{{ $comment->author->name }}</h4>
      			<p>on {{ $comment->created_at->format('d/m/Y') }}</p>
      			<p>{{ $comment->message }}</p>
      		</div>
      		@endforeach
      		
				<div class="form-group">
					<div class="col-md-14">
						<textarea class="form-control" placeholder="Write your comment..."></textarea>
					</div>
				</div>
				<button class="btn btn-primary">Submit</button>
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
