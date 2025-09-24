<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;
    protected $table = 'statistik';
    protected $fillable = [
        'tenaga_medis',
        'alat_medis',
        'total_puskeswan',
    ];
}
