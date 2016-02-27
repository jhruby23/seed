<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
	protected $dates = ['date_completed'];
	
	public function scopeCompleted($query)
	{
		$query->whereNotNull('date_completed');
	}
	
	public function scopeActive($query)
	{
		$query->whereNull('date_completed');
	}
	
	public function scopeSuccessful($query)
	{
		$query->completed()->where('success', true);
	}
	
	public function conversation()
	{
		return $this->hasMany(BidConversation::class);
	}
	
	public function sold()
	{
		return $this->belongsTo(Product::class, 'item');
	}
	
	public function bought()
	{
		return $this->belongsTo(Product::class, 'offer');
	}
	
	public function seller()
	{	
		return $this->belongsTo(User::class, 'owner');
	}
	
	public function buyer()
	{
		return $this->belongsTo(User::class, 'buyer');
	}
}
