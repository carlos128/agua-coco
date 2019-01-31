<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'idUser'=>'1',
			'userName' => str_random(10).'@gmail.com',
			'userPassword' => Hash::make('123456'),
			'isLogin'=> 1,
			'active'=> 1,
			'crateBy'=> str_random(10).'@gmail.com',
			'createDt'=>Carbon::now(),
		]);
	}
}