<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "id" => "1",
			"nama_role" => "admin"
		]);

        Role::create([
            "id" => "2",
			"nama_role" => "owner"
		]);

        Role::create([
            "id" => "3",
			"nama_role" => "buyer"
		]);
    }
}
