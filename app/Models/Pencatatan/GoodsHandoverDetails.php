<?php

namespace App\Models\Pencatatan;

use App\Models\Master\Goods;
use App\Models\Master\Procurement;
use App\Models\Master\Puskeswan;
use App\Models\Master\Unit;
use App\Models\Penerima;
use App\Models\Pengirim;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Ramsey\Uuid\Uuid;

class GoodsHandoverDetails extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'goods_handover_id',
        'goods_id',
        'unit_id',
        'procurement_id',
        'goods_amount',
        'tgl_exp_date',
        'pengirim_id',
        'penerima_id',

    ];


    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    public function procurement()
    {
        return $this->belongsTo(Procurement::class, 'procurement_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }

    public function handover()
    {
        return $this->belongsTo(GoodsHandover::class, 'goods_handover_id', 'id');
    }

    public function pengirim()
    {
        return $this->belongsTo(Pengirim::class, 'pengirim_id', 'id');
    }

    public function penerima()
    {
        return $this->belongsTo(Penerima::class, 'penerima_id', 'id');
    }
}
