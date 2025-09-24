<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Kabupaten',
            'email' => 'adminpks@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'role_id' => '1',
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('Admin');

        $puskeswan = User::create([
            'name' => 'Puskeswan Tanjung Pinang',
            'email' => 'puskeswantanjung@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'role_id' => '2',
            'remember_token' => Str::random(10),
        ]);

        $puskeswan->assignRole('Puskeswan');

        $puskeswan = User::create([
            'name' => 'Puskeswan Nglegok',
            'email' => 'puskeswannglegok@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'role_id' => '2',
            'remember_token' => Str::random(10),
        ]);

        $puskeswan->assignRole('Puskeswan');

        $puskeswan = User::create([
            'name' => 'Puskeswan Srengat UPT',
            'email' => 'puskeswansrengat@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'role_id' => '2',
            'remember_token' => Str::random(10),
        ]);

        $puskeswan->assignRole('Puskeswan');
    }
}
