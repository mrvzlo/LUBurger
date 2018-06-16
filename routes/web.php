<?php
Auth::routes();
Route::redirect('/','/EN');
Route::get('lang/{locale}', 'LangController@change');

Route::get('{locale}/users','AdminController@index');
Route::get('{locale}/users/update','AdminController@update');

Route::get('{locale}/dish/add','DishController@create');
Route::post('{locale}/dish/new','DishController@store');
Route::get('{locale}/dish/{id}','DishController@show');

Route::get('{locale}/ingredients','IngredientController@index');
Route::get('{locale}/ingredients/new','IngredientController@store');

Route::get('{locale}', 'DishController@index');
Route::resource('ingredient', 'IngredientController');
