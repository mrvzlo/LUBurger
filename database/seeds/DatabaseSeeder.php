<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
			'name' => 'Admin',
			'email' => 'admin@luburger.lv',
			'password' => bcrypt('qweasd'),
			'phone' => '00000000000',
			'role' => 2,
		]);	
    	DB::table('users')->insert([
			'name' => 'John',
			'email' => 'Johnny@Gui.tar',
			'password' => bcrypt('qweasd'),
			'phone' => '12345654321',
		]);	
    	DB::table('users')->insert([
			'name' => 'Chef',
			'email' => 'Chef@luburger.lv',
			'password' => bcrypt('qweasd'),
			'phone' => '88005553535',
			'role' => 3,
		]);	

		DB::table('orders')->insert([
			'user_id' => 2,
			'created_at' => '2018-05-05 16:10:00',
			'status' => 1,
			'delivery' => '2018-05-05 16:40:00',
			'sum'=> 12.00,
			'address' => "Augusta Deglava iela 71",
		]);	
		DB::table('orders')->insert([
			'user_id' => 2,
			'created_at' => '2018-06-18 19:00:00',
			'delivery' => '2018-06-18 19:30:00',
			'sum' => 22.00,
			'address' => "",
			'address' => "Dzerbenes iela 12",
		]);	
		
		
		//dishes
		DB::table('dishes')->insert([
			'name' => 'Luburger',
			'price' => 8.50,
			'photo_url' => 'luburger.jpg',
		]);	
		DB::table('dishes')->insert([
			'name' => 'Classical',
			'price' => 6.00,
			'photo_url' => 'classical.jpg',
		]);	
		DB::table('dishes')->insert([
			'name' => 'Bacon burger',
			'price' => 7.50,
			'photo_url' => 'bacon.jpg',
		]);
		DB::table('dishes')->insert([
			'name' => 'Vegetarian',
			'price' => 6.50,
			'photo_url' => 'vegetarian.jpg',
		]);	
		DB::table('dishes')->insert([
			'name' => 'Cheeseburger',
			'price' => 7.00,
			'photo_url' => 'cheese.jpg',
		]);	
		DB::table('dishes')->insert([
			'name' => 'French fries',
			'price' => 3.50,
			'photo_url' => 'french_fries.jpg',
		]);	
		DB::table('dishes')->insert([
			'name' => 'Buffalo wings',
			'price' => 5.50,
			'photo_url' => 'wings.jpg',
		]);	
		DB::table('dishes')->insert([
			'name' => 'Cheesecake',
			'price' => 4.50,
			'photo_url' => 'cheesecake.jpg',
		]);	
		
		
		//ingredients
		DB::table('ingredients')->insert([
			'name' => 'beef',
		]);	
		DB::table('ingredients')->insert([
			'name' => 'lettuce',
		]);	
		DB::table('ingredients')->insert([
			'name' => 'bacon',
		]);
		DB::table('ingredients')->insert([
			'name' => 'cheese',
		]);	
		DB::table('ingredients')->insert([
			'name' => 'cream cheese',
		]);	
		DB::table('ingredients')->insert([
			'name' => 'pickles',
		]);	
		DB::table('ingredients')->insert([
			'name' => 'mayonnaise',
		]);	
		DB::table('ingredients')->insert([
			'name' => 'bun',
		]);
		DB::table('ingredients')->insert([
			'name' => 'tomatoes',
		]);
		DB::table('ingredients')->insert([
			'name' => 'butter',
		]);
		DB::table('ingredients')->insert([
			'name' => 'chicken',
		]);
		DB::table('ingredients')->insert([
			'name' => 'tofu',
		]);
		DB::table('ingredients')->insert([
			'name' => 'onion',
		]);
		DB::table('ingredients')->insert([
			'name' => 'tomato sauce',
		]);
		
		
		//list of ingredients
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '1',
			'dish_id' => '1',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '2',
			'dish_id' => '1',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '3',
			'dish_id' => '1',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '4',
			'dish_id' => '1',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '8',
			'dish_id' => '1',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '9',
			'dish_id' => '1',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '14',
			'dish_id' => '1',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '5',
			'dish_id' => '8',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '10',
			'dish_id' => '8',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '1',
			'dish_id' => '2',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '8',
			'dish_id' => '2',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '4',
			'dish_id' => '2',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '6',
			'dish_id' => '2',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '14',
			'dish_id' => '2',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '1',
			'dish_id' => '3',
		]);	
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '2',
			'dish_id' => '3',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '3',
			'dish_id' => '3',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '4',
			'dish_id' => '3',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '8',
			'dish_id' => '3',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '7',
			'dish_id' => '3',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '7',
			'dish_id' => '4',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '2',
			'dish_id' => '4',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '12',
			'dish_id' => '4',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '9',
			'dish_id' => '4',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '1',
			'dish_id' => '5',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '2',
			'dish_id' => '5',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '8',
			'dish_id' => '5',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '4',
			'dish_id' => '5',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '14',
			'dish_id' => '5',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '14',
			'dish_id' => '7',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '13',
			'dish_id' => '7',
		]);
		DB::table('dishes_ingredients')->insert([
			'ingredient_id' => '11',
			'dish_id' => '7',
		]);
		
		
		//dishes in order
		DB::table('orders_dishes')->insert([
			'order_id' => '1',
			'dish_id' => '1',
		]);
		DB::table('orders_dishes')->insert([
			'order_id' => '1',
			'dish_id' => '1',
		]);
		DB::table('orders_dishes')->insert([
			'order_id' => '2',
			'dish_id' => '2',
		]);
		DB::table('orders_dishes')->insert([
			'order_id' => '2',
			'dish_id' => '7',
		]);
		DB::table('orders_dishes')->insert([
			'order_id' => '2',
			'dish_id' => '5',
		]);
		DB::table('orders_dishes')->insert([
			'order_id' => '2',
			'dish_id' => '6',
		]);
    }
}
