<?php

namespace App\Models\Pencatatan;

use App\Models\Master\Goods;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsRecording extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'goods_id',
        'goods_entry',
        'goods_out',
        'tgl_exp_date',
        'description',
        'user_id'
    ];

    protected $guarded = ['id'];
    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
