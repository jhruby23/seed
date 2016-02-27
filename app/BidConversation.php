<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidConversation extends Model
{
	public function bid()
	{
		return $this->belongsTo(Bid::class);
	}
}
