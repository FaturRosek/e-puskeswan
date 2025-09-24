<?php

namespace Database\Seeders;

use App\Models\Master\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create([
            'unit_type' => 'Tablet',
        ]);
        Unit::create([
            'unit_type' => 'Gram',
        ]);
    }
}
