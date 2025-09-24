<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinaryProfile extends Model
{
    use HasFactory;

    protected $table = 'veterinary_profile';

    protected $fillable = [
        'title',
        'photo',
        'description',
        'created_by',
        'updated_by',
    ];
}
