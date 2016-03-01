<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\ProductType;
use App\Product;
use App\Bid;
use App\User;
use App\Comment;
use \Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Hash;

class PagesController extends Controller
{
	public function categories()
	{
		echo '<pre>';
		$arr = Category::all();
		//print_r($arr);
		
		foreach($arr as $c){
			$prod = $c->products->toArray();
			print_r($prod);
		}
	}
	
	public function productTypes()
	{
		echo '<pre>';
		$arr = ProductType::all();
		//print_r($arr);
		
		foreach($arr as $t){
			$prod = $t->products->toArray();
			print_r($prod);
		}
	}
	
	public function bids()
	{
		echo '<pre>';
		echo '<h1>All bids</h1>';
		$arr = Bid::all()->toArray();
		print_r($arr);
		
		echo '<h1>Completed bids</h1>';
		$bid = Bid::completed()->get()->toArray();
		print_r($bid);
		
		echo '<h1>Successfully completed bids</h1>';
		$bid = Bid::successful()->get()->toArray();
		print_r($bid);
		
		echo '<h1>First bid conversation</h1>';
		$bid = Bid::first()->conversation->toArray();
		print_r($bid);
	}
	
	public function profile()
	{
		return view('layouts.profile');
	}
	
	public function welcome()
	{
		if(Auth::check())
			return redirect()->route('home');
			
		return view('welcome', ['latest' => $this->offersLatest(3), 'trending' => $this->offersTrending(3)]);
	}
	
	public function search($text)
	{
		return $text;
	}
	
	public function offersAll()
	{
    	return Product::queryable()->notMine()->get();
	}
	
	public function offersTrending($limit = -1)
	{
    	return Product::queryable()->notMine()->orderby('views', 'desc')->take($limit)->get();
	}
	
	public function offersLatest($limit = -1)
	{
		return Product::queryable()->notMine()->orderby('created_at', 'desc')->take($limit)->get();
	}
	
	public function comment()
	{
		$input['product'] = Input::get('product');
		$input['text'] = Input::get('text');
		$input['check'] = Input::get('check');
		
		$product = Product::queryable()->findOrFail($input['product']);
		
		if(Hash::check($product->slug, $input['check'])){
			$comment = new Comment;
		   $comment->product_id = $input['product'];
		   $comment->writer = Auth::user()->id;
			$comment->message = $input['text'];		
			$comment->save();
		}
		
		$comments = $product->comments;
		return view('products.comments', compact('comments'));
	}
}
