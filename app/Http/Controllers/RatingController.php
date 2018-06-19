<?php

namespace App\Http\Controllers;

use App\rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
	public function __construct()
	{
        $this->middleware('auth');
	}
	public function assign($user, $dish, $score)
	{
		if ($user = Auth::User()->id)
		{
			$a = Rate::where('user','=',$user)->where('dish','=',$dish);
			if ($a->count()==0) 
			{
				Rate::insert(['user' => $user, 'dish' => $dish, 'score' => $score]);
			}
			else $a->update(['score'=>$score]);
		}
		return redirect()->back();
	}
}
