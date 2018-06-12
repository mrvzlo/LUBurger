<?php
    function ChangeLang($lang='en')
    {
    	if ($lang != '') App::setlocale($lang);
    }