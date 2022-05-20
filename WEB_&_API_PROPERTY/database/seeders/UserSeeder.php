<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        User::create([
			"name" => "admin",
			"email" => "admin@gmail.com",
			"password" => bcrypt("alan"),
			"id_role" =>1
		]);

        User::create([
			"name" => "owner",
			"email" => "owner@gmail.com",
			"password" => bcrypt("alan"),
			"id_role" =>2
		]);

        User::create([
			"name" => "alan",
			"email" => "alan@gmail.com",
			"password" => bcrypt("alan"),
			"id_role" =>2
		]);


    }
}
