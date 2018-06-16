<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

	public function index($lang)
	{
    	ChangeLang($lang);
        $req = User::all();
        return view('users',['users'=>$req]);
	}

    public function update($lang, Request $request)
    {
    }
}
