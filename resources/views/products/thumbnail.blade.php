<div class="col-md-4">
	<h3>{{ link_to_route('products.show', $product->name, [$product->id]) }}</h3>
	<p>{{ $product->category->name }} - {{ $product->subcategory->name }}</p>
	<p>&pound;{{ $product->price }}</p>
</div>