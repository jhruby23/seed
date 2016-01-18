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
use \Auth;

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
		return view('welcome');
	}
	
	public function search($text)
	{
		return $text;
	}
	
	public function offersAll()
	{
		echo '<pre>';
    	$arr = Product::with('category', 'productType', 'images', 'owner')->queryable()->notMine()->get()->toArray();
    	print_r($arr);
	}
	
	public function offersTrending()
	{
		echo '<pre>';
    	$arr = Product::with('category', 'productType', 'images', 'owner')->queryable()->notMine()->orderby('views', 'desc')->get()->toArray();
    	print_r($arr);
	}
	
	public function offersNew()
	{
		echo '<pre>';
    	$arr = Product::with('category', 'productType', 'images', 'owner')->queryable()->notMine()->orderby('created_at', 'desc')->get()->toArray();
    	print_r($arr);
	}
}
