<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use \Auth;
use Illuminate\Database\Eloquent\Collection;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    		return Product::with('subcategory.category', 'images', 'owner')->queryable()->mine()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {		
	 		$related = $this->related($product);
    		
    		return view('products.show', compact('product', 'related'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    
    /**
     * Select related products.
     * 
     * @param int $count
     * @return Collection
     */
    public function related($product, $count = 3)
    {
	    	//select products from the same subcategory
    		$related = Product::queryable()->notMine()->whereHas('subcategory', function($q) use ($product){
	    		$q->where('name', $product->subcategory->name);
    		})->whereNotIn('id', [$product->id])->orderBy('views', 'desc')->take($count)->get();
    		
    		//if not enough, add products from the same category
    		if($related->count() < $count){
    			$used = array_merge([$product->id], $related->lists('id')->toArray());
    		
	 			$cat = Product::queryable()->notMine()->whereHas('subcategory.category', function($q) use ($product){
	    			$q->where('name', $product->category->name);
		 		})->whereNotIn('id', $used)->orderBy('views', 'desc')->take($count - $related->count())->get();
		 		
		 		$related = $related->merge($cat);
		 	}
		 	
		 	//if still not enough, add any popular products
    		if($related->count() < $count){
    			$used = array_merge([$product->id], $related->lists('id')->toArray());
    		
	 			$cat = Product::queryable()->notMine()->whereNotIn('id', $used)->orderBy('views', 'desc')->take($count - $related->count())->get();
		 		
		 		$related = $related->merge($cat);
		 	}
		 	
		 	return $related;
    }
}
