<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function change($lang)
    {
    	$url = mb_strtolower(url()->previous());
        $pre = ['/en', '/lv', '/ru'];
        App::setlocale($lang);
        $lang = '/'.mb_strtolower($lang);
    	foreach ($pre as $p) 
            if (strpos($url,$p)!==false)
                $url = substr_replace($url,$lang,strpos($url,$p),3); 
        if (strpos($url,$lang)===false) return redirect($lang);
    	return redirect($url);
    }

    public function apply($lang)
    {
    	ChangeLang($lang);
    }
}
