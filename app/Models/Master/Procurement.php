<?php

namespace App\Models\Master;

use App\Models\Pencatatan\GoodsHandover;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    use HasFactory;
    protected $fillable = [
        'procurement_type',
    ];


    public function serahterima()
    {
        return $this->hasMany(GoodsHandover::class, 'procurement_id', 'id');
    }
}
