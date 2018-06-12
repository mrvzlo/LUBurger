<?php
Auth::routes();
Route::redirect('/','/EN');
Route::get('{locale}/dish/{id}','DishController@show');
Route::get('lang/{locale}', 'LangController@change');
Route::get('{locale}', 'GaleryController@index');
