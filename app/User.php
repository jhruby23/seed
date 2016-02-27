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
	    return $this->hasMany(Notification::class);
    }
    
    public function products()
    {
	    return $this->hasMany(Product::class, 'owner');
    }
    
    public function bids()
    {
	    return $this->hasMany(Bid::class, 'owner');
    }
    
    public function bidsCompleted()
    {
	    return $this->hasMany(Bid::class, 'owner')->completed();
    }
    
    public function bidsActive()
    {
	    return $this->hasMany(Bid::class, 'owner')->active();
    }
    
    public function offers()
	 {
	    return $this->hasMany(Bid::class, 'buyer');
    }
    
    public function offersCompleted()
	 {
	    return $this->hasMany(Bid::class, 'buyer')->completed();
    }
    
    public function offersActive()
	 {
	    return $this->hasMany(Bid::class, 'buyer')->active();
    }
    
    public function comments()
	 {
	    return $this->hasMany(Comment::class);
    }
}
