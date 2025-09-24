<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'user_id',
        'nama_penerima',
        'NIP',
        'pangkat',
        'jabatan',
        'alamat_penerima',

    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
