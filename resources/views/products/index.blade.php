@extends('layouts.app', ['pageTitle' => 'My products'])

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
      	<div class="panel-heading">My products</div>
      	<div class="panel-body">
      		@foreach($products as $product)
	         	@include('products.thumbnail', ['product' => $product])
      		@endforeach
      	</div>
		</div>
	</div>
</div>
@endsection
