<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Master\GoodsTypeDataTable;
use App\Http\Requests\Master\UpdateGoodsType;
use App\Http\Requests\Master\StoreGoodsType;
use App\Models\Master\GoodsType;

class JenisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(GoodsTypeDataTable $dataTable)
    {
        $jenis = GoodsType::all();
        return $dataTable->render('pages.admin.master.GoodsType.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.GoodsType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGoodsType $request)
    {
        try {
            $data = $request->validated();
            $recording = GoodsType::create($data);

            if ($recording) {
                return response()->json([
                    'success' => 'Data Berhasil Ditambahkan',
                ]);
            }
            throw new \Exception('Gagal menambahkan data');
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
        $jenis = GoodsType::findOrFail($id);
        return view('pages.admin.master.GoodsType.show', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenis = GoodsType::findOrFail($id);
        return view('pages.admin.master.GoodsType.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGoodsType $request, string $id)
    {
        $jenis = GoodsType::findOrFail($id);
        $data = $request->validated();
        $jenis->update($data);

        return redirect()->route('jenis.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis = GoodsType::findOrFail($id);
        $jenis->delete();

        return response()->json([
            'success' => 'Data Berhasil Dihapus ' . $id
        ]);
    }
}
