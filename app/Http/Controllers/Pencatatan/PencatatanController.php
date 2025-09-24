<?php

namespace App\Http\Controllers\Pencatatan;

use App\DataTables\Pencatatan\GoodsRecordingDataTable;
use App\Exports\ExportPencatatan;
use App\Http\Requests\Pencatatan\StoreGoodsRecording;
use App\Models\Pencatatan\GoodsRecording;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pencatatan\UpdateGoodsRecording;
use App\Models\Master\Goods;
use App\Models\Pencatatan\GoodsHandover;
use App\Models\Pencatatan\GoodsHandoverDetails;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

use PhpParser\Node\Stmt\TryCatch;

class PencatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $barang = Goods::all();
        $data = GoodsRecording::where('user_id', $userId)->orderBy('created_at', 'asc')->get();

        return view('pages.admin.pencatatan.GoodsRecording.index', compact('barang', 'data'));
    }


    public function export()
    {
        return Excel::download(new ExportPencatatan, "pencatatan_barang.xlsx");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.pencatatan.GoodsRecording.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreGoodsRecording $request)
    {
        try {
            $data = $request->validated();
            $recording = GoodsRecording::create($data);

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
        $barang = Goods::all();
        $pencatatan = GoodsRecording::findOrFail($id);
        return view('pages.admin.pencatatan.GoodsRecording.show', compact('pencatatan', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pencatatan = GoodsRecording::find($id);
        return view('pages.admin.pencatatan.Goodsrecording.edit', compact('pencatatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGoodsRecording $request, GoodsRecording $pencatatan)
    {
        $pencatatan->goods_name = $request->goods_name;
        $pencatatan->goods_entry = $request->goods_entry;
        $pencatatan->goods_out = $request->goods_out;
        $pencatatan->description = $request->description;
        $pencatatan->save();

        return redirect()->route('pencatatan.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recording = GoodsRecording::find($id);
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
