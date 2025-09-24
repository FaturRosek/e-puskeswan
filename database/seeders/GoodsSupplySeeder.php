<?php

namespace Database\Seeders;

use App\Models\Pencatatan\GoodsSupply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoodsSupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GoodsSupply::create([
            'goods_id' => '1',
            'unit_id' => '1',
            'warehouse_id' => '1',
            'stock' => '10'
        ]);
    }
}
