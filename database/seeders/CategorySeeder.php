<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nama' => 'pulsa',
            'deskripsi' => 'pulsa murah ey'
        ]);
        DB::table('categories')->insert([
            'nama' => 'topup game',
            'deskripsi' => 'toprup game murah ey'
        ]);
    }
}
