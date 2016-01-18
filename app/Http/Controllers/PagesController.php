<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\ProductType;
use App\Product;
use App\Bid;
use App\User;

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
	
	public function products()
	{
		echo '<pre>';
		/*
		$arr = Product::all()->toArray();
		print_r($arr);
		
		$cat = Product::first()->category->toArray();
		print_r($cat);
		
		$type = Product::first()->productType->toArray();
		print_r($type);
		
		$bids = Product::first()->bids->toArray();
		print_r($bids);
		*/
		echo '<h1>All product of current auth user with all details</h1>';
		$arr = Product::where('id', \Auth::user()->id)->with('category', 'productType', 'bids', 'offered', 'comments', 'images')->get()->toArray();
		print_r($arr);
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
	
	public function users()
	{
		echo '<pre>';
		$arr = User::with(['bids', 'offers'])->get()->toArray();
		print_r($arr);
	}
}
