<?php

namespace App\Livewire\Pencatatan;

use App\Models\Pencatatan\GoodsHandoverDetails as ModelGoodsHandover;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class GoodsHandover extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $goods_id, $unit_id, $procurement_id, $warehouse, $goods_amount, $tgl_exp_date, $description, $goodshandover_id;
    public function store()
    {
        $rules = [
            'goods_id' => 'required|exists:goods,id',
            'unit_id' => 'required|exists:units,id',
            'procurement_id' => 'required|exists:procurements,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'goods_amount' => 'required',
            'tgl_exp_date' => 'required|date',
            'description' => 'required',
        ];
        $validated = $this->validate($rules);
        ModelGoodsHandover::create($validated);
    }
    public function delete()
    {
        $id = $this->goodshandover_id;
        dd($id);
        ModelGoodsHandover::find($id)->delete();
        session()->flash('message', 'Data berhasil dihapus');
    }

    public function delete_confirmation($id)
    {
        $this->goodshandover_id = $id;
    }
    public function render()
    {
        $data = ModelGoodsHandover::orderBy('created_at', 'asc')->paginate(5);

        return view('livewire.pencatatan.goods-handover', ['handover' => $data]);
    }
}
