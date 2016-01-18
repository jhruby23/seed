<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	public function markAsSeen()
	{
		$this->attribute['seen'] = true;
	}
}
