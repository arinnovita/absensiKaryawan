<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            ['jabatan' => 'Manager'],
            ['jabatan' => 'Supervisor'],
            ['jabatan' => 'Human Resource'],
            ['jabatan' => 'Daily Worker'],
            ['jabatan' => 'Operator Produksi'],
            ['jabatan' => 'IT'],
            ['jabatan' => 'Marketing'],
        ]);
    }
}
