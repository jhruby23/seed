<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	 
	 public function getId()
	 {
		 return $this->id;
	 }
    
    public function notifications()
    {
	    return $this->hasMany('App\Notification');
    }
    
    public function products()
    {
	    return $this->hasMany('App\Product', 'owner');
    }
    
    public function bids()
    {
	    return $this->hasMany('App\Bid', 'owner');
    }
    
    public function offers()
	 {
	    return $this->hasMany('App\Bid', 'buyer');
    }
    
    public function comments()
	 {
	    return $this->hasMany('App\Comment');
    }
}
