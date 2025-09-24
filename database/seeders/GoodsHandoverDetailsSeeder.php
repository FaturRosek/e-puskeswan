<?php

namespace Database\Seeders;

use App\Models\Pencatatan\GoodsHandoverDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoodsHandoverDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GoodsHandoverDetails::create([
            'goods_id' => '1',
            'unit_id' => '1',
            'procurement_id' => '2',
            'warehouse_id' => '1',
            'goods_amount' => '20',
            'tgl_exp_date' => '2025-04-12',


        ]);

        GoodsHandoverDetails::create([
            'goods_id' => '2',
            'unit_id' => '2',
            'procurement_id' => '1',
            'warehouse_id' => '1',
            'goods_amount' => '15',
            'tgl_exp_date' => '2025-05-12',

        ]);
        GoodsHandoverDetails::create([
            'goods_id' => '1',
            'unit_id' => '2',
            'procurement_id' => '1',
            'warehouse_id' => '1',
            'goods_amount' => '15',
            'tgl_exp_date' => '2025-05-12',

        ]);
        GoodsHandoverDetails::create([
            'goods_id' => '1',
            'unit_id' => '1',
            'procurement_id' => '2',
            'warehouse_id' => '1',
            'goods_amount' => '15',
            'tgl_exp_date' => '2025-05-12',


        ]);
        GoodsHandoverDetails::create([
            'goods_id' => '2',
            'unit_id' => '1',
            'procurement_id' => '2',
            'warehouse_id' => '1',
            'goods_amount' => '15',
            'tgl_exp_date' => '2025-05-12',


        ]);
    }
}
