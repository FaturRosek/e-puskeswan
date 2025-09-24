<?php

namespace Database\Seeders;

use App\Models\Setting\VeterinaryProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilLandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VeterinaryProfile::create([
            'title' => 'Judul Profil',
            'photo' => 'gambar',
            'description' => 'deskripsi',
            'created_by' => 'admin',
            'updated_by' => 'admin'
        ]);
    }
}
