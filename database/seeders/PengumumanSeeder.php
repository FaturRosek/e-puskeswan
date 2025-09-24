<?php

namespace Database\Seeders;

use App\Models\Setting\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcement::create([
            'judul' => 'Judul Pengumuman',
            'deskripsi' => 'Deskripsi',
            'image' => 'gambar',
        ]);
    }
}
