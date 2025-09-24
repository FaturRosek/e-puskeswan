<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Master\UnitsDataTable;
use App\Http\Requests\Master\UpdateUnits;
use App\Http\Requests\Master\StoreUnits;
use App\Models\Master\Unit;

class SatuanController extends Controller
{
    public function index(UnitsDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.master.Units.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.Units.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreUnits $request)
    {
        try {
            $data = $request->validated();
            $recording = Unit::create($data);

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
        $satuan = Unit::findOrFail($id);
        return view('pages.admin.master.Units.show', compact('satuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $satuan = Unit::find($id);
        return view('pages.admin.master.Units.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnits $request, Unit $satuan)
    {
        $satuan->unit_type = $request->unit_type;
        $satuan->save();

        return redirect()->route('satuan.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recording = Unit::find($id);
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
