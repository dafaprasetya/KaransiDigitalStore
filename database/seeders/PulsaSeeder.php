<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PulsaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
            'nama' => 'pulsa 10k',
            'harga' => '12000',
            'category_id' => '1',
            'deskripsi' => 'pulsa 10 ribu',
        ]);
        DB::table('produks')->insert([
            'nama' => 'pulsa 15k',
            'harga' => '17000',
            'category_id' => '1',
            'deskripsi' => 'pulsa 15 ribu',
        ]);
        DB::table('produks')->insert([
            'nama' => 'pulsa 20k',
            'harga' => '22000',
            'category_id' => '1',
            'deskripsi' => 'pulsa 20 ribu',
        ]);
        DB::table('produks')->insert([
            'nama' => 'pulsa 25k',
            'harga' => '27000',
            'category_id' => '1',
            'deskripsi' => 'pulsa 25 ribu',
        ]);
        DB::table('produks')->insert([
            'nama' => 'pulsa 35k',
            'harga' => '38000',
            'category_id' => '1',
            'deskripsi' => 'pulsa 35 ribu',
        ]);
        DB::table('produks')->insert([
            'nama' => 'pulsa 45k',
            'harga' => '47000',
            'category_id' => '1',
            'deskripsi' => 'pulsa 45 ribu',
        ]);
        DB::table('produks')->insert([
            'nama' => 'pulsa 50k',
            'harga' => '51500',
            'category_id' => '1',
            'deskripsi' => 'pulsa 50 ribu',
        ]);
    }
}
