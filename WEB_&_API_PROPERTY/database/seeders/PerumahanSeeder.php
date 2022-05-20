<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Perumahan;

class PerumahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('id_ID');
        Perumahan::create([
            "id" => 1,
			"nama_perumahan" => "Balongan Asri",
            "alamat" => "Balongan",
            "uraian" => "aman, nyaman, dan tentram",
            "stok" => "50",
            "foto" => "image/dOyaex5fayFhKgvwYnAI4i8XstI7e88WEuZHbqxO.jpg",
            "id_user" =>2
		]);

        Perumahan::create([
            "id" => 2,
			"nama_perumahan" => "Permai",
            "uraian" => "Aman Banjir",
            "alamat" => "Indramayu",
            "stok" => "40",
            "foto" => "image/CbRBeKAAfwRUwmsYtlBPq67GcO0xofc93kjFU1If.jpg",
            "id_user" =>2
		]);

    }
}
