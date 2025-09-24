<?php

namespace Database\Seeders;

use App\Models\Pencatatan\GoodsHandover;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoodsHandoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GoodsHandover::create([
            'date_received' => '2024-05-12',
            'file_BAST' => 'ini file BAST',
            'BAST_number' => 'BAST.2024',
            'description' => 'Terima dari APBN',

        ]);
    }
}
