<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Produk::create([
            'Nama' => 'Brownis Padang',
            'Deskripsi' => 'brownis kekinian rasa rendang 250gr',
            'Quantity' => '90',
            'Expired'=>'2022-10-20',
            'gambar'=> 'post-gambar\l0snY0G7myuVyRALcrK57Bi0wFQflhuGkez9W4Bp.png'

        ]);
        Produk::create([
            'Nama' => 'Keripik Kopi',
            'Deskripsi' => 'olahan kopi yang renyah 500gr',
            'Quantity' => '70',
            'Expired'=>'2022-10-10',
            'gambar'=> 'post-gambar\Pk7j9WANOu67lAJdHjIrfwQy9EPy1AQhO6PIX9Il.jpg'
        ]);
        
    }
}
