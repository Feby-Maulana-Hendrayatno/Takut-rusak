<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\DeskripsiRumah;

class DeskripsiRumahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeskripsiRumah::create([
            "id" => "1",
			"type" => "45",
            "harga" =>50000000,
            "kusen" => "Kayu",
            "pintu" => "Kayu Panil",
            "jendela" => "Kaca",
            "plafond" => "Gypsum rangka Holo",
            "air" => "PDAM",
            "listrik" => "900 Watt",
            "pondasi" => "Batu Kali",
            "dinding" => "Bata ringan / Hebel diaci dan dicat",
            "lantai" => "Keramik",
            "atap" => "Baja Ringan dan Genteng Beton",
            "wc" => " closet Jongkok",
		]);

        DeskripsiRumah::create([
            "id" => "2",
			"type" => "36",
            "harga" =>75000000,
            "kusen" => "Kayu",
            "pintu" => "Kayu Panil",
            "jendela" => "Kaca",
            "plafond" => "Gypsum rangka Holo",
            "air" => "PDAM",
            "listrik" => "900 Watt",
            "pondasi" => "Batu Kali",
            "dinding" => "Bata ringan / Hebel diaci dan dicat",
            "lantai" => "Keramik",
            "atap" => "Baja Ringan dan Genteng Beton",
            "wc" => " closet Jongkok",
		]);
    }
}
