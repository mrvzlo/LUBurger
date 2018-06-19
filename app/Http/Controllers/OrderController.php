<?php

namespace App\Http\Controllers;

use App\order;
use App\dish;
use App\ord_dish;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateInterval;

class OrderController extends Controller
{
	public function __construct()
	{
        $this->middleware('auth');
        date_default_timezone_set('europe/Riga');
	}

	public function index($lang)
	{
    	ChangeLang($lang);
    	$count = 0;
    	if (!Auth::User()->isAdmin()) $req = Order::where('user_id','=',Auth::User()->id)->orderBy('status')->get();
    	else $req = Order::all();
    	foreach ($req as $key => $v) {
    		$user = User::findOrFail($v->user_id);
    		$v->u_name = $user->name;
    		$v->u_phone = $user->phone;
    		$count++;
    		if ($v->status!=1) $v->delivery="-";
    		else 
    		{
    			if ($this->check($v->delivery)) 
    			{
    				$v->status=2;
    				Order::where('id','=',$v->id)->update(['status' => 2]);
    				$v->delivery="-";
    			}
				else 
					$v->delivery = date_create_from_format('Y-m-d H:i:s',$v->delivery)->format('d.m H:i');
    		}
    		$statuses = array('preparing', 'delivering','delivered');
    		$v->status = CanTrans($statuses[$v->status]);
    	}
    	return view('orders',['ords'=>$req,'count'=>$count]);
	}

	public function store($lang, Request $req)
	{
    	ChangeLang($lang);
    	if (!session()->exists('cart')) return redirect()->back();
        $data = $req->all();
        $rules = array('address' => 'required|min:3|max:100',);
        $this->validate($req, $rules);
        $total = 0.0;
        $ord = new Order();
        foreach (session('cart') as $key => $value) {
        	$dish = Dish::findOrFail($key);
        	$total += $value * $dish->price;
        }
        $ord->sum=$total;
        $ord->user_id=Auth::User()->id;
        $ord->address = $data['address'];
        $ord->save();
        foreach (session('cart') as $key => $value) {
        	$DO = new Ord_dish();
        	$DO->dish_id = $key;
        	$DO->count = $value; 
        	$DO->order_id = $ord->id;
        	$DO->save();
        }
        session()->forget('cart');
		return redirect($lang.'/orders');
	}

	public function show($lang, $id)
	{
    	ChangeLang($lang);
    	$req = Order::findOrFail($id);
    	if (!Auth::User()->isAdmin() && Auth::User()->id != $req->user_id) return redirect()->back();
    	elseif (Auth::User()->isAdmin()) $user = User::findOrFail($req->user_id);
    	else $user = Auth::User();

    		$req->u_name = $user->name;
    		$req->u_phone = $user->phone;
    		if ($req->status!=1) $req->delivery="-";
    		else {
    			if ($this->check($req->delivery)) 
    			{
    				$req->status=2;
    				Order::where('id','=',$req->id)->update(['status' => 2]);
    				$req->delivery="-";
    			}
				else 
  		  			$req->delivery = date_create_from_format('Y-m-d H:i:s',$req->delivery)->format('H:i');
    		}
    		$statuses = array('preparing', 'delivering','delivered');
    		$req->st=$req->status;
    		$req->status = CanTrans($statuses[$req->status]);

    	$OD = Ord_dish::where('order_id','=',$id)->get();
        foreach ($OD as $key => $value) {
        	$dish = Dish::findOrFail($value->dish_id);
        	$value->name = $dish->name;
        	$value->price = $dish->price;
        }

    	return view('order_show',['ord'=>$req, 'list' => $OD]);
	}
	public function update($lang, $id, Request $req)
	{
    	ChangeLang($lang);
    	$ord = Order::where('id','=',$id);
        $rules = array('time' => 'required',);
        $this->validate($req, $rules);

        $now = Carbon::now();
        list($hours, $minutes) = sscanf($req['time'], '%d:%d');
        $interval = new DateInterval(sprintf('PT%dH%dM', $hours, $minutes));

        $time = date_add($now,$interval);

        $ord->update(['status' => 1, 'delivery' => $time]);
    	return redirect()->back();
	}

	public function check($date)
	{
        $now = Carbon::now();
        $date = date_create_from_format('Y-m-d H:i:s',$date);
        return ($date <= $now); 
	}
}
