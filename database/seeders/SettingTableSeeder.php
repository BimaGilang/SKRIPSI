<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'Saleproject',
            'alamat' => 'Jl. Karang Anyar No. 155 Desa Ngronggo RT 01 RW 02 Kecamatan Kota Kediri, 64127',
            'telepon' => '085755946995',
            'tipe_nota' => 1,
            'path_logo' => '/img/saleproject.png',
        ]);
    }
}
