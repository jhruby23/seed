<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use \Auth;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Product extends Model implements SluggableInterface
{
	use SluggableTrait;

   protected $sluggable = [
   	'build_from' => 'name',
      'save_to'    => 'slug',
   ];
   
	protected $fillable = [
		'name',
		'category',
		'subcategory',
		'price',
		'description',
		'quantity',
      'date_of_end'
	];
	
	protected $dates = ['date_of_end'];
	
	public function owner()
	{
		return $this->belongsTo(User::class, 'owner_id');
	}
	
	public function subcategory()
	{
		return $this->belongsTo(Subcategory::class);
	}
	
	public function category()
	{
		$cat = $this->subcategory()->getResults();
		return $cat->belongsTo(Category::class);
	}
	
	public function bids()
	{
		return $this->hasMany(Bid::class, 'item');
	}
	
	public function offered()
	{
		return $this->hasMany(Bid::class, 'offer');
	}
	
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
	
	public function images()
	{
		return $this->hasMany(Image::class);
	}
	
	public function scopeNotMine($query)
	{
		if(Auth::check())
			$query->where('owner_id', '!=', Auth::user()->id);
	}	

	public function scopeMine($query)
	{
		if(Auth::check())
			$query->where('owner_id', '=', Auth::user()->id);
	}
	
	public function scopeQueryable($query)
	{
		$query->where('public', true)->where('date_of_end', '>=', Carbon::now());
	}
}
