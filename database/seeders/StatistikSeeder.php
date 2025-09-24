<?php

namespace Database\Seeders;

use App\Models\Setting\Statistik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statistik::create([
            'tenaga_medis' => '10',
            'alat_medis' => '100',
            'total_puskeswan' => '12'
        ]);
    }
}
