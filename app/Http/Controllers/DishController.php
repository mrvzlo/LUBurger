<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DishController extends Controller
{
	public function show($lang, $id)
	{
    	app('App\Http\Controllers\LangController')->apply($lang);
		return view('dish_show');
	}
}
