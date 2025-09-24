<?php

namespace App\Models\Master;

use App\Models\Pencatatan\GoodsHandover;
use App\Models\Pencatatan\GoodsHandoverDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Puskeswan extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'uuid', 'name','user_id', 'address', 'kelurahan', 'kecamatan', 'latitude', 'longitude',
    ];

    public function serahterima()
    {
        return $this->hasMany(GoodsHandoverDetails::class, 'puskeswan_id', 'uuid');
    }
}
