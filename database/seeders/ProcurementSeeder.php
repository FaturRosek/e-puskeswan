<?php

namespace Database\Seeders;

use App\Models\Master\Procurement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Procurement::create([
            'procurement_type' => 'APBN',
        ]);
        Procurement::create([
            'procurement_type' => 'APBD',
        ]);
    }
}
