<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use \Auth;

class Product extends Model
{
	protected $fillable = [
		'name',
		'category',
		'product_type',
		'price',
		'description',
		'quantity',
      'date_of_end'
	];
	
	protected $dates = ['date_of_end'];
	
	public function owner()
	{
		return $this->belongsTo('App\User', 'owner');
	}
	
	public function category()
	{
		return $this->belongsTo('App\Category');
	}
	
	public function productType()
	{
		return $this->belongsTo('App\ProductType');
	}
	
	public function bids()
	{
		return $this->hasMany('App\Bid', 'item');
	}
	
	public function offered()
	{
		return $this->hasMany('App\Bid', 'offer');
	}
	
	public function comments()
	{
		return $this->hasMany('App\Comment');
	}
	
	public function images()
	{
		return $this->hasMany('App\Image');
	}
	
	public function scopeNotMine($query)
	{
		if(Auth::check())
			$query->where('owner', '!=', Auth::user()->id);
	}	

	public function scopeMine($query)
	{
		if(Auth::check())
			$query->where('owner', '=', Auth::user()->id);
	}
	
	public function scopeQueryable($query)
	{
		$query->where('public', true)->where('date_of_end', '>=', Carbon::now());
	}
}
