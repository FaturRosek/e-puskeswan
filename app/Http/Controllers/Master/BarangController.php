<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Master\GoodsDataTable;
use App\Http\Requests\Master\UpdateGoods;
use App\Http\Requests\Master\StoreGoods;
use App\Models\Master\Goods;
use App\Models\Master\GoodsType;

class BarangController extends Controller
{
    public function index(GoodsDataTable $dataTable)
    {
        $jenis = GoodsType::all();
        return $dataTable->render('pages.admin.master.Goods.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.Goods.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreGoods $request)
    {
        try {
            $data = $request->validated();
            $recording = Goods::create($data);

            if ($recording) {
                return response()->json([
                    'success' => 'Data Berhasil Ditambahkan',
                ]);
            }
            throw new \Exception('Gagal');
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Goods::findOrFail($id);
        return view('pages.admin.master.Goods.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Goods::find($id);
        return view('pages.admin.master.Goods.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGoods $request, Goods $barang)
    {
        $barang->goods_name = $request->goods_name;
        $barang->goods_type = $request->goods_type;
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recording = Goods::find($id);
        $recording->delete();
        return response()->json([
            'success' => 'Data Berhasil Dihapus ' . $id
        ]);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
