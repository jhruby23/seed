@extends('layouts.app', ['pageTitle' => $product->name])

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
      	<div class="panel-heading">Edit {{ $product->name }}</div>
      	<div class="panel-body">
      	@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

      	{!! Form::model($product, ['method' => 'PATCH', 'route' => ['products.update', $product->slug]]) !!}
      	
      		<div id="basics">
	      		<h3>Essential product details</h3>
	      		<h4>Specify the basics</h4>
	      		
	      		<div class="form-group">
	      			{!! Form::label('name', 'Name') !!}
		      		{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
	      		</div>
	      		
	      		<div class="form-group">
	      			{!! Form::label('description', 'Description') !!}
		      		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	      		</div>
      		</div>
      		
      		<div id="more">
      			<h3>Additional details</h3>
      			<h4>Provide more information</h4>
					
	      		<div class="form-group col-md-6" style="padding-left: 0;">
	      			{!! Form::label('subcategory_id', 'Category') !!}
		      		{!! Form::select('subcategory_id', $categories, null, ['placeholder' => 'Select category']) !!}
	      		</div>
	      		
	      		<div class="form-group col-md-6" style="padding-left: 0;">
	      			{!! Form::label('date_of_end', 'Date of end') !!}
		      		{!! Form::date('date_of_end', \Carbon\Carbon::now()->addWeek(), ['class' => 'form-control']) !!}
	      		</div>
      		
	      		<div class="form-group col-md-6" style="padding-left: 0;">
	      			{!! Form::label('quantity', 'Quantity') !!}
		      		{!! Form::input('number', 'quantity', 1, ['class' => 'form-control', 'min' => 1]) !!}
	      		</div>
	      		
	      		<div class="form-group col-md-6" style="padding-left: 0;">
	      			{!! Form::label('price', 'Approximate price') !!}
		      		{!! Form::input('number', 'price', null, ['class' => 'form-control', 'min' => 0]) !!}
	      		</div>
      		</div>
      		
	      	{!! Form::submit('Edit product', ['class' => 'btn btn-primary form-control']) !!}
      		
      	{!! Form::close() !!}
      	</div>
		</div>
	</div>
</div>
@endsection
