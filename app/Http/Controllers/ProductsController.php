<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category;
use \Auth;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{	 
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    		$products = Product::queryable()->mine()->get();
    		
    		return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    		
    		$cats = Category::with('subcategories')->get();
    		$categories = [];
    		
    		foreach($cats as $cat)
    			$categories = array_add($categories, $cat->name, $cat->subcategories->lists('name', 'id')->toArray());
    		
    		return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
    		$product = new Product;
    		$product->name = $request->input('name');
    		$product->description = $request->input('description');
    		$product->subcategory_id = $request->input('subcategory_id');
    		$product->price = $request->input('price');
    		$product->views = 0;
    		$product->owner_id = Auth::user()->id;
    		$product->public = true;
    		$product->date_of_end = \Carbon\Carbon::parse($request->input('date_of_end'));
    		
    		if($request->input('type') == 'item'){
    			if(($request->has('quantity')) && ($request->input('quantity') >= 1))
    				$product->quantity = $request->input('quantity');
    		} else
    			$product->quantity = -1;
    		
    		$product->save();
    		
    		return redirect()->route('products.show', $product->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {		
	 		$related = $product->related();
    		
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
    		if($product->mine()){
    			$cats = Category::with('subcategories')->get();
	 			$categories = [];
    		
	 			foreach($cats as $cat)
    				$categories = array_add($categories, $cat->name, $cat->subcategories->lists('name', 'id')->toArray());
	    		
	    		return view('products.edit', compact('product', 'categories'));
	    	} else
	    		return redirect()->route('products.show', $product->slug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
    		$product->name = $request->input('name');
    		$product->description = $request->input('description');
    		$product->subcategory_id = $request->input('subcategory_id');
    		$product->price = $request->input('price');
    		
    		$product->save();
    		
    		return redirect()->route('products.show', $product->slug);
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
}
