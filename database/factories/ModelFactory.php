<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
	
	return [
		'userName' => $faker->email,
		'userPassword' => bcrypt ( ' 12345 ' ),
		'isLogin'=> 1,
		'active'=> 1,
		'crateBy'=> $faker->name,
		'createDt'=>Carbon::now(),
		
		
	];
});
