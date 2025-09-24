<?php

namespace App\Http\Controllers\Pencatatan;

use App\DataTables\Pencatatan\GoodsSupplyDataTable;
use App\Http\Controllers\Controller;
use App\Models\Master\Goods;
use App\Models\Master\Puskeswan;
use App\Models\Master\Unit;
use App\Models\Pencatatan\GoodsSupply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class StokBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(GoodsSupplyDataTable $dataTable)
    // {
    //     return $dataTable->render('pages.admin.pencatatan.GoodsSupply.index');
    // }

    public function index()
    {
        $barang = Goods::all();
        $lokasi = User::all();
        $satuan = Unit::all();
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login

        if ($user->role_id == 1) {
            // Jika role id 1, maka ambil semua data stok barang
            $stok = GoodsSupply::with(['goods', 'unit', 'user'])->get();
        } else if ($user->role_id == 2) {
            // Jika role id 2, maka ambil data stok barang sesuai dengan id pengguna
            $stok = GoodsSupply::with(['goods', 'unit', 'user'])->where('user_id', $user->id)->get();
        } else {
            // Jika role id tidak dikenali, maka tidak ada data yang ditampilkan
            $stok = collect();
        }

        return view('pages.admin.pencatatan.GoodsSupply.index', compact('stok', 'barang', 'lokasi', 'satuan'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.pencatatan.GoodsSupply.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'goods_id' => 'required|exists:goods,id',
            'unit_id' => 'required|exists:units,id',
            'user_id' => 'required|exists:users,id',
            'stock' => 'required|max:255',
        ]);
        $updateStock = GoodsSupply::where('goods_id', $request->goods_id)
            ->where('unit_id', $request->unit_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($updateStock) {
            $updateStock->stock += $request->stock;
            $updateStock->updated_at = now();
            $updateStock->save();
        } else {
            GoodsSupply::create([
                'id' => Uuid::uuid4()->toString(),
                'goods_id' => $request->goods_id,
                'unit_id' => $request->unit_id,
                'user_id' => $request->user_id,
                'stock' => $request->stock,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('stokBarang.index')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
