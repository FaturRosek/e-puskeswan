<?php

namespace Database\Seeders;

use App\Models\Master\Goods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Goods::create([
            'goods_name' => 'Mixagrip',
            'goods_type' => 'Obat',
        ]);
        Goods::create([
            'goods_name' => 'Oskadon',
            'goods_type' => 'Obat',
        ]);
    }
}
