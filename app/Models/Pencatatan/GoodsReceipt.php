<?php

namespace App\Models\Pencatatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'goods_amount',
        'date_received',
        'exp_date',
    ] ;
}
