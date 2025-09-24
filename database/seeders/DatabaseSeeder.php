<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Setting\VeterinaryProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MenusSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PermissionsSeeder::class,
            // BackupScheduleSeeder::class,
            // BackupScheduleTablesSeeder::class,
            AccessSeeder::class,
            GoodsSeeder::class,
            UnitSeeder::class,
            ProcurementSeeder::class,
            WarehouseSeeder::class,
            BerandaTableSeeder::class,
            ContactSeeder::class,
            GoodsTypeSeeder::class,
            StatistikSeeder::class,
            // ProfilLandingSeeder::class,
            // PengumumanSeeder::class
            // GoodsSupplySeeder::class,
            // GoodsRecordingSeeder::class,
            // GoodsHandoverSeeder::class,
            // GoodsHandoverDetailsSeeder::class,
        ]);
    }
}
