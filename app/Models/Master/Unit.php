<?php

namespace App\Models\Master;

use App\Models\Pencatatan\GoodsHandover;
use App\Models\Pencatatan\GoodsSupply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_type',
    ];
    public function serahterima()
    {
        return $this->hasMany(GoodsHandover::class, 'unit_id', 'id');
    }
    public function persediaan()
    {
        return $this->hasMany(GoodsSupply::class, 'unit_id', 'id');
    }
}
