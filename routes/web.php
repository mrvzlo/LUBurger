<?php
Auth::routes();
Route::redirect('/','/EN');
Route::get('lang/{locale}', 'LangController@change');

Route::get('{locale}/users','AdminController@index');
Route::get('{locale}/users/update','AdminController@update');

Route::get('{locale}', 'DishController@index');
Route::get('{locale}/dish/add','DishController@create');
Route::post('{locale}/dish/new','DishController@store');
Route::get('{locale}/dish/{id}','DishController@show');

Route::get('{locale}/ingredients','IngredientController@index');
Route::get('{locale}/ingredients/new','IngredientController@store');

Route::get('{locale}/cart', 'CartController@index');
Route::get('{locale}/cart/add/{id}', 'CartController@add');
Route::get('{locale}/cart/remove/{id}', 'CartController@remove');

Route::get('{locale}/orders', 'OrderController@index');
Route::get('{locale}/order/new', 'OrderController@store');
Route::get('{locale}/order/update/{id}', 'OrderController@update');
Route::get('{locale}/order/{id}', 'OrderController@show');

Route::get('rate/{user}/{dish}/{score}','RatingController@assign');

Route::get('theme/{color}', function($color){
	session()->put('theme', $color);
	return redirect()->back();
});

Route::resource('ingredient', 'IngredientController');
