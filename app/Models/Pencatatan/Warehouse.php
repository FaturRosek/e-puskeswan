<?php

namespace App\Models\Pencatatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'warehouse_name',
        'location',
    ];
    public function persediaan()
    {
        return $this->hasMany(GoodsSupply::class, 'warehouse_id', 'id');
    }

    public function serahterima()
    {
        return $this->hasMany(GoodsHandoverDetails::class, 'warehouse_id', 'id');
    }
}
