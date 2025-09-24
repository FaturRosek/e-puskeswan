<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_type',
    ];
    protected $table = 'goods_types';

}
