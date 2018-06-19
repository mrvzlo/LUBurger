<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
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
        $data = $request->all();
        foreach ($data as $key => $value) {
            $id = substr($key,4);
            if ($value=='chef') $res=3;
            elseif ($value=='admin') $res=2;
            else $res=1;
            if ($id != Auth::User()->id) User::where('id','=',$id)->update(['role'=>$res]);
        }
        return redirect($lang.'/users');
    }
}
