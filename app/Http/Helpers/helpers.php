<?php
    function ChangeLang($lang='en')
    {
    	if ($lang != '') App::setlocale($lang);
    }
    function CanTrans($st)
    {
    	$st = strtolower($st);
        if (__('msg.'.$st) != 'msg.'.$st) return __('msg.'.$st);
        else return $st;
    }