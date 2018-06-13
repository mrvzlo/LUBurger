<?php

namespace App\Http\Controllers;

use App\User;
use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

	public function index($lang)
	{
    	ChangeLang($lang);
        $req = Ingredient::all();
        foreach ($req as $key => $value) $req[$key]->name=strtolower($req[$key]->name);
        return view('ingredients',['ings'=>$req]);
	}

    public function store($lang, Request $request)
    {
        $data = $request->all();
        $rules = array('name' => 'required|min:3|max:100|unique:ingredients',);
        $this->validate($request, $rules);
        $ingr = new ingredient();
        $ingr->name = $data['name'];
        $ingr->save();
        return redirect($lang.'/ingredients');
    }
}
