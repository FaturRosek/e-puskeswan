<?php

namespace App\Http\Controllers\Pencatatan;

use App\DataTables\Pencatatan\WarehousesDataTable;
use App\Http\Requests\Pencatatan\StoreWarehouses;
use App\Models\Pencatatan\Warehouse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pencatatan\UpdateWarehouses;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WarehousesDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.pencatatan.Warehouse.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.pencatatan.Warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreWarehouses $request)
    {
        try {
            $data = $request->validated();
            $recording = Warehouse::create($data);

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
        $gudang= Warehouse::findOrFail($id);
        return view('pages.admin.pencatatan.Warehouse.show', compact('gudang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gudang = Warehouse::find($id);
        return view('pages.admin.pencatatan.Warehouse.edit', compact('gudang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouses $request, Warehouse $gudang)
    {
        $gudang->warehouse_name = $request->warehouse_name;
        $gudang->location = $request->location;
        $gudang->save();

        return redirect()->route('gudang.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recording = Warehouse::find($id);
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
