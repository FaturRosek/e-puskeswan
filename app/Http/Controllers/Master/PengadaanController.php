<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Master\ProcurementsDataTable;
use App\Http\Requests\Master\UpdateProcurements;
use App\Http\Requests\Master\StoreProcurements;
use App\Models\Master\Procurement;

class PengadaanController extends Controller
{
    public function index(ProcurementsDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.master.Procurements.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.Procurements.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreProcurements $request)
    {
        try {
            $data = $request->validated();
            $recording = Procurement::create($data);

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
        $pengadaan = Procurement::findOrFail($id);
        return view('pages.admin.master.Procurements.show', compact('pengadaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengadaan = Procurement::find($id);
        return view('pages.admin.master.Procurements.edit', compact('pengadaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProcurements $request, Procurement $pengadaan)
    {
        $pengadaan->procurement_type = $request->procurement_type;
        $pengadaan->save();

        return redirect()->route('pengadaan.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recording = Procurement::find($id);
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
