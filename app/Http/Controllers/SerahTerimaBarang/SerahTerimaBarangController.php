<?php

namespace App\Http\Controllers\SerahTerimaBarang;

use App\Http\Controllers\Controller;
use App\Models\Pencatatan\GoodsHandover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Master\Goods;
use App\Models\Master\Procurement;
use App\Models\Master\Unit;
use Barryvdh\DomPDF\Facade\Pdf;

class SerahTerimaBarangController extends Controller
{
    public function index()
    {
        $serahTerimaBarang = GoodsHandover::orderBy('created_at', 'DESC')->get();
 
        return view('pages.admin.pencatatan.serahTerimaBarang.index', compact('serahTerimaBarang'));
    }
 
    public function create()
    {
        $goods = Goods::all();
        $units = Unit::all();
        $procurements = Procurement::all();

        return view('pages.admin.pencatatan.serahTerimaBarang.create', compact('goods', 'units', 'procurements'));
    }
 
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'goods_id' => 'required|exists:goods,id', 
            'unit_id' => 'required|exists:units,id', 
            'procurement_id' => 'required|exists:procurements,id',
            'goods_amount' => 'required',
            'BAST_number' => 'required', 
            'file_BAST' => 'required',
            'description' => 'required',
            'date_received' => 'required|date', 
            'tgl_exp_date' => 'required|date', 
        ]);

        if ($validator->fails()) {
            return redirect()->route('serahTerimaBarang.create')
                ->withErrors($validator)
                ->withInput();
        }

        GoodsHandover::create([
            'goods_id' => $request->input('goods_id'),
            'unit_id' => $request->input('unit_id'),
            'procurement_id' => $request->input('procurement_id'),
            'goods_amount' => $request->input('goods_amount'),
            'BAST_number' => $request->input('BAST_number'),
            'file_BAST' => $request->input('file_BAST'),
            'description' => $request->input('description'),
            'date_received' => $request->input('date_received'), 
            'tgl_exp_date' => $request->input('tgl_exp_date'),
        ]);

        return redirect()->route('serahTerimaBarang.index')->with('success', 'serahTerimaBarang added successfully');
    }

    public function show(string $id)
    {
        $serahTerimaBarang = GoodsHandover::findOrFail($id);
        $goods = Goods::all();
        $units = Unit::all();
        $procurements = Procurement::all();

        return view('pages.admin.pencatatan.serahTerimaBarang.show', compact('serahTerimaBarang', 'goods', 'units', 'procurements'));
    }
 
    public function edit(string $id)
    {
        $serahTerimaBarang = GoodsHandover::findOrFail($id);
        $goods = Goods::all();
        $units = Unit::all();
        $procurements = Procurement::all();

        return view('pages.admin.pencatatan.serahTerimaBarang.edit', compact('serahTerimaBarang', 'goods', 'units', 'procurements'));
    }

    public function update(Request $request, string $id)
    {

        $serahTerimaBarang = GoodsHandover::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'goods_id' => 'required|exists:goods,id', 
            'unit_id' => 'required|exists:units,id', 
            'procurement_id' => 'required|exists:procurements,id', 
            'goods_amount' => 'required', 
            'BAST_number' => 'required', 
            'file_BAST' => 'required',
            'description' => 'required',
            'date_received' => 'required|date', 
            'tgl_exp_date' => 'required|date', 
        ]);

        if ($validator->fails()) {
            return redirect()->route('serahTerimaBarang.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $serahTerimaBarang->update([
            'goods_id' => $request->input('goods_id'),
            'unit_id' => $request->input('unit_id'),
            'procurement_id' => $request->input('procurement_id'),
            'goods_amount' => $request->input('goods_amount'),
            'BAST_number' => $request->input('BAST_number'),
            'file_BAST' => $request->input('file_BAST'),
            'description' => $request->input('description'),
            'date_received' => $request->input('date_received'),
            'tgl_exp_date' => $request->input('tgl_exp_date'),
        ]);

        return redirect()->route('serahTerimaBarang.index')->with('success', 'serahTerimaBarang updated successfully');
    }
 

    public function destroy(string $id)
    {
        $serahTerimaBarang = GoodsHandover::findOrFail($id);
 
        $serahTerimaBarang->delete();
 
        return redirect()->route('serahTerimaBarang.index')->with('success', 'serahTerimaBarang deleted successfully');
    }

    public function export($id)
    {   
        $serahTerimaBarang = GoodsHandover::findOrFail($id);
        $goods = Goods::all();
        $units = Unit::all();
        $procurements = Procurement::all();
        $pdf = PDF::loadView('pages.admin.pencatatan.serahTerimaBarang.pdf', [
            'serahTerimaBarang' => $serahTerimaBarang,
            'goods' => $goods,
            'units' => $units,
            'procurements' => $procurements,
        ]);
    
        // Unduh file PDF dengan nama yang sesuai
        return $pdf->download('serah-terima-barang.pdf');
    }
    
}
