<?php

namespace Database\Seeders;

use App\Models\Master\GoodsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoodsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GoodsType::create([
            'name_type' => 'Obat-Obatan'
        ]);
        GoodsType::create([
            'name_type' => 'Peralatan Medis'
        ]);
    }
}
