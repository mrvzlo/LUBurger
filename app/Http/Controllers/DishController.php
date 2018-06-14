<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DishController extends Controller
{
	public function show($lang, $id)
	{
    	ChangeLang($lang);
		return view('dish_show');
	}

	public function create($lang)
	{
    	ChangeLang($lang);
    	return view('dish_add');
	}
}
