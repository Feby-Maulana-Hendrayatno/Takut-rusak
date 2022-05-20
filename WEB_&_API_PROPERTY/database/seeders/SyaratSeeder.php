<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Syarat;

class SyaratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        Syarat::create([
			"syarat" => "Formulir Kredit Pemilikan Rumah",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Keterangan Sebagai Karyawan",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Fotocopy ktp",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Fotocopy kartu keluarga",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Legalisir Keterangan Penghasilan (Slip Gaji)",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Legalisir Kartu Pegawai",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Legalisir SK Pertama dan Terakhir",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Fotocopy Rekening Tabungan 4 bulan",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Fotocopy Surat Izin Usaha Perdagangan (SIUP)",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Fotocopy Tanda Daftar Perusahaan",
            "id_user" => 2
		]);

        Syarat::create([
			"syarat" => "Fotocopy NPWP Pribadi",
            "id_user" => 2
		]);

    }
}
