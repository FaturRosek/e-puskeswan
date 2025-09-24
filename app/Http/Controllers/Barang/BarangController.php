<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Models\Master\Goods;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function index()
    {
        $barang = Goods::orderBy('created_at', 'DESC')->get();
 
        return view('pages.admin.master.barang.index', compact('barang'));
    }

    public function create()
    {
        $barang = Goods::all();
        return view('pages.admin.master.barang.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'goods_name' => 'required',
            'goods_type' => 'required'
        ]);

        Goods::create([
            'goods_name' => $request->goods_name,
            'goods_type' => $request->goods_type
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }


    public function show(string $id)
    {
        $barang = Goods::findOrFail($id);
 
        return view('pages.admin.master.barang.show', compact('barang'));
    }
 

    public function edit(string $id)
    {
        $barang = Goods::findOrFail($id);
 
        return view('pages.admin.master.barang.edit', compact('barang'));
    }
 

    public function update(Request $request, string $id)
    {
        $barang = Goods::findOrFail($id);
 
        $barang->update($request->all());
 
        return redirect()->route('barang.index')->with('success', 'barang updated successfully');
    }
 

    public function destroy(string $id)
    {
        $barang = Goods::findOrFail($id);
 
        $barang->delete();
 
        return redirect()->route('barang.index')->with('success', 'barang deleted successfully');
    }
}
