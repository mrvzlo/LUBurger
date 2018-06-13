<?php
Auth::routes();
Route::redirect('/','/EN');
Route::get('lang/{locale}', 'LangController@change');

Route::get('{locale}/dish/add','DishController@create');
Route::get('{locale}/dish/{id}','DishController@show');

Route::get('{locale}/ingredients','IngredientController@index');

Route::get('{locale}', 'GaleryController@index');
