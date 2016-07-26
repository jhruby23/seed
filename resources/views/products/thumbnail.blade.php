<div class="col product">
	<img class="product__image" src="https://unsplash.it/400">
	<div class="product__info">
		<p class="product__name">{{ link_to_route('products.show', $product->name, [$product->slug]) }}</p>
		<div class="cols">
			<p class="product__category">{{ $product->category->name }} - {{ $product->subcategory->name }}</p>
			<p class="product__price">&pound;{{ $product->price }}</p>
		</div>
	</div>
</div>
