<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    use HasFactory;

    protected $table = 'beranda';

    protected $fillable = [
        'judul',
        'sub_judul',
        'image',
    ];
}
