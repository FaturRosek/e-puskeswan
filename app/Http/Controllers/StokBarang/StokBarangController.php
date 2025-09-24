<?php

namespace App\Http\Controllers\StokBarang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Goods;
use App\Models\Master\Unit;
use App\Models\Pencatatan\GoodsSupply;
use App\Models\Pencatatan\Warehouse;
use Illuminate\Support\Facades\Validator;
use App\Models\Pencatatan\GoodsHandover;

class StokBarangController extends Controller
{
    public function index()
    {
        $stokBarang = GoodsSupply::orderBy('created_at', 'DESC')->get();
 
        return view('pages.admin.pencatatan.stokBarang.index', compact('stokBarang'));
    }
 
    public function create()
    {
        $goods = Goods::all();
        $units = Unit::all();
        $warehouses = Warehouse::all();

        return view('pages.admin.pencatatan.stokBarang.create', compact('goods', 'units', 'warehouses'));
    }
 
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'goods_id' => 'required|exists:goods,id', 
            'unit_id' => 'required|exists:units,id', 
            'warehouse_id' => 'required|exists:warehouses,id',
            'stock' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('stokBarang.create')
                ->withErrors($validator)
                ->withInput();
        }

        GoodsSupply::create([
            'goods_id' => $request->input('goods_id'),
            'unit_id' => $request->input('unit_id'),
            'warehouse_id' => $request->input('warehouse_id'),
            'stock' => $request->input('stock'),
        ]);

        return redirect()->route('stokBarang.index')->with('success', 'stokBarang added successfully');
    }

    public function show(string $id)
{
    $stokBarang = GoodsSupply::findOrFail($id);
    $goods = Goods::all();
    $units = Unit::all();
    $warehouses = Warehouse::all();

    $serahTerimaBarang = GoodsHandover::orderBy('created_at', 'DESC')->get();

    return view('pages.admin.pencatatan.stokBarang.show', compact('stokBarang', 'goods', 'units', 'warehouses', 'serahTerimaBarang'));
}

 
    public function edit(string $id)
    {
        $stokBarang = GoodsSupply::findOrFail($id);
        $goods = Goods::all();
        $units = Unit::all();
        $warehouses = Warehouse::all();

        return view('pages.admin.pencatatan.stokBarang.edit', compact('stokBarang', 'goods', 'units', 'warehouses'));
    }

    public function update(Request $request, string $id)
    {

        $stokBarang = GoodsSupply::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'goods_id' => 'required|exists:goods,id', 
            'unit_id' => 'required|exists:units,id', 
            'warehouse_id' => 'required|exists:warehouses,id', 
            'stock' => 'required', 
        ]);

        if ($validator->fails()) {
            return redirect()->route('stokBarang.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $stokBarang->update([
            'goods_id' => $request->input('goods_id'),
            'unit_id' => $request->input('unit_id'),
            'warehouse_id' => $request->input('warehouse_id'),
            'stock' => $request->input('stock'),
        ]);

        return redirect()->route('stokBarang.index')->with('success', 'stokBarang updated successfully');
    }
 

    public function destroy(string $id)
    {
        $stokBarang = GoodsSupply::findOrFail($id);
 
        $stokBarang->delete();
 
        return redirect()->route('stokBarang.index')->with('success', 'stokBarang deleted successfully');
    }
}
