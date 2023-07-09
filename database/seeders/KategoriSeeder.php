<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Kategori::create([
        'kategori' => 'bencana alam'
     ]);
     Kategori::create([
        'kategori' => 'kemanusiaan'
     ]);
     Kategori::create([
        'kategori' => 'rumah ibadah'
     ]);
    }
}
