<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rop')->insert([
            'id_rop' => 1,
            'total_penjualan' => 50,
            'total_hari_penjualan' => 15,
            'demand' => 3,
            'lead_time' => 7,
            'safety_stock' => 4,
            'reorder_point' => 25,
        ]);
    }
}
