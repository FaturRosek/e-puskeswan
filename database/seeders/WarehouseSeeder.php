<?php

namespace Database\Seeders;

use App\Models\Pencatatan\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create([
            'warehouse_name' => 'Gudang PIL',
            'location' => 'Bangka Belitung',
        ]);
    }
}
