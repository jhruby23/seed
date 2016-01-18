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
		return $this->hasMany('App\BidConversation');
	}
}
