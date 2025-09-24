<?php

namespace Database\Seeders;

use App\Models\Pencatatan\GoodsRecording;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoodsRecordingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GoodsRecording::create([
            'goods_id' => '1',
            'goods_entry' => '20',
            'goods_out' => '0',
            'description' => 'Terima dari APBN',
        ]);
    }
}
