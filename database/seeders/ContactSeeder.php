<?php

namespace Database\Seeders;

use App\Models\Setting\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'email' => 'puskeswan@gmail.com',
            'alamat' => 'Jl. Cokroaminoto No.22, Kepanjen Lor, Kec. Kepanjenkidul, Kota Blitar, Jawa Timur 66117',
            'telepon' => '(0342) 801136'
        ]);
    }
}
