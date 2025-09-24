<?php

namespace Database\Seeders;

use App\Models\User\Role;
use Illuminate\Database\Seeder;



class RoleSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create([
            'name' => 'Admin',
        ]);
        Role::create([
            'name' => 'Puskeswan',
        ]);
    }
}
