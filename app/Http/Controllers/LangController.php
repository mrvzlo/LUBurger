<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function change($lang)
    {
    	$url = mb_strtolower(url()->previous());
        $pre = ['/en/', '/lv/', '/ru/'];
        App::setlocale($lang);
        $lang = mb_strtolower($lang);
    	$url = preg_replace($pre, $lang, $url);   
    	return redirect($url);
    }

    public function apply($lang)
    {
    	ChangeLang($lang);
    }
}
