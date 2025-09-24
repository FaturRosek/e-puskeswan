<?php

namespace App\Models\Pencatatan;

use App\Models\Master\Goods;
use App\Models\Master\Puskeswan;
use App\Models\Master\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsSupply extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'goods_id',
        'unit_id',
        'user_id',
        'stock',
    ];

    protected $guarded = ['id'];
    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    // public function puskeswan()
    // {
    //     return $this->belongsTo(Puskeswan::class, 'puskeswan_id', 'uuid');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
