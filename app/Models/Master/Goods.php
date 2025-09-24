<?php

namespace App\Models\Master;

use App\Models\Pencatatan\GoodsHandover;
use App\Models\Pencatatan\GoodsSupply;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    protected $fillable = [
        'goods_name',
        'goods_type',
    ];

    public function serahterima()
    {
        return $this->hasMany(GoodsHandover::class, 'goods_id', 'id');
    }
    public function pencatatan()
    {
        return $this->hasMany(GoodsHandover::class, 'goods_id', 'id');
    }
    public function persediaan()
    {
        return $this->hasMany(GoodsSupply::class, 'goods_id', 'id');
    }
    public function goodsType() {
        return $this->belongsTo(GoodsType::class, 'goods_type_id');
    }
}
