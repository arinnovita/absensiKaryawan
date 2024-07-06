<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeteranganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keterangan')->insert([
            ['keterangan' => 'Hadir'],
            ['keterangan' => 'Izin'],
            ['keterangan' => 'Cuti'],
        ]);
    }
}
