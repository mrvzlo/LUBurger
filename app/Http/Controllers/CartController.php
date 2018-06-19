<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function __construct()
	{
        $this->middleware('auth');
	}

	public function index($lang)
	{
    	ChangeLang($lang);
        $a = array();
        $i=0;
        $total=0.0;
        if (session()->exists('cart'))
        {
	        foreach (session('cart') as $key => $value) {
	        	$a[$i]=Dish::findOrFail($key);
	        	$a[$i]->name = CanTrans($a[$i]->name);
	        	$a[$i]->count = $value;
	        	$total += $a[$i]->count * $a[$i]->price;
	        	$i++;
	        }
	    }
		return view('cart',['list' => $a, 'total'=>$total, 'count' =>$i]);
	}

	public function add($lang, $id)
	{
    	ChangeLang($lang);
    	if (!session()->exists('cart')) session()->put('cart', array());
    	$a = session('cart');
    	if (isset($a[$id])) $a[$id]++;
    	else $a[$id]=1;
    	session()->put('cart',$a);
		return redirect($lang.'/cart');
	}

	public function remove($lang, $id)
	{
    	ChangeLang($lang);
    	if (session()->exists('cart')){
	    	$a = session('cart');
	    	if (isset($a[$id])) 
	    	{
	    		if ($a[$id]>1) $a[$id]--;
		    	else unset($a[$id]);
		    	session()->put('cart',$a);
	    	}
    	}
		return redirect($lang.'/cart');
	}
}
