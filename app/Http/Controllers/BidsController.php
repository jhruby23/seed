<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Bid;
use \Auth;

class BidsController extends Controller
{    
	  
	  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    		$bidsActive_ = User::with('bidsActive', 'bidsActive.sold')->where('id', Auth::user()->id)->first()->toArray();
    		$bidsActive = $bidsActive_['bids_active'];
    		
    		$offersActive_ = User::with('offersActive', 'offersActive.bought')->where('id', Auth::user()->id)->first()->toArray();
    		$offersActive = $offersActive_['offers_active'];
    		
    		$bidsCompleted_ = User::with('bidsCompleted', 'bidsCompleted.sold', 'bidsCompleted.bought')->where('id', Auth::user()->id)->first()->toArray();
    		$bidsCompleted = $bidsCompleted_['bids_completed'];
    		
    		$offersCompleted_ = User::with('offersCompleted', 'offersCompleted.sold', 'offersCompleted.bought')->where('id', Auth::user()->id)->first()->toArray();
    		$offersCompleted = $offersCompleted_['offers_completed'];
    		
    		return view('bids.index', compact('bidsActive', 'offersActive', 'bidsCompleted', 'offersCompleted'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	
    		echo '<pre>';
        $bid = Bid::with('sold', 'bought', 'seller', 'buyer')->findOrFail($id)->toArray();
        print_r($bid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
