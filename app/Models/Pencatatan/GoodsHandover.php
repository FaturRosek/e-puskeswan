<?php

namespace App\Models\Pencatatan;

use App\Models\Master\Goods;
use App\Models\Master\Procurement;
use App\Models\Master\Unit;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsHandover extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'date_received',
        'file_bast',
        'no_bast',
        'description',
        'user_id',
    ];
    public function details()
    {
        return $this->hasMany(GoodsHandoverDetails::class, 'goods_handover_id', 'id');
    }
    // protected $guarded = ['id'];
    // public function goods()
    // {
    //     return $this->belongsTo(Goods::class, 'goods_id', 'id');
    // }

    // public function unit()
    // {
    //     return $this->belongsTo(Unit::class, 'unit_id', 'id');
    // }
    // public function procurement()
    // {
    //     return $this->belongsTo(Procurement::class, 'procurement_id', 'id');
    // }
}
