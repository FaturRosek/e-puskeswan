<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting\Beranda;
use Illuminate\Support\Facades\File;

class BerandaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagepath = public_path('uploads/Beranda/');
        $files = File::allFiles($imagepath);
        Beranda::create([
            'judul' => 'Judul Puskeswan',
            'sub_judul' => 'Sub Judul Puskeswan',
            'image' => 'uploads/Beranda/' . $files[1]->getFilename(),
        ]);
    }
}
