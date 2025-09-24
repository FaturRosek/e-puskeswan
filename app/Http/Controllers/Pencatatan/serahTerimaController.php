<?php

namespace App\Http\Controllers\Pencatatan;


use App\Http\Controllers\Controller;
use App\Models\Master\Goods;
use App\Models\Master\Procurement;
use App\Models\Master\Puskeswan;
use App\Models\Master\Unit;
use App\Models\Pencatatan\GoodsHandover;
use App\Models\Pencatatan\GoodsHandoverDetails;
use App\Models\Pencatatan\GoodsRecording;
use App\Models\Pencatatan\GoodsSupply;
use App\Models\Pencatatan\Warehouse;
use App\Models\Penerima;
use App\Models\Pengirim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\serahTerimaExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class serahTerimaController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $serahTerima = GoodsHandover::where('user_id', $userId)->get();
        return view('pages.admin.pencatatan.GoodsHandover.index', compact('serahTerima'));
    }

    public function create()
    {
        $barang = Goods::all();
        $satuan = Unit::all();
        $pengadaan = Procurement::all();
        $puskeswan = Puskeswan::all();
        $user = User::all();
        $data = Session::get('goods', []);
        return view('pages.admin.pencatatan.GoodsHandover.create', compact('barang', 'satuan', 'pengadaan', 'data',  'puskeswan', 'user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'date_received' => 'required|date',
            'no_bast' => 'required|string|max:255',
            'file_bast' => 'nullable|file',
            'description' => 'nullable|string',
            'goods_id.*' => 'required|exists:goods,id',
            'unit_id.*' => 'required|exists:units,id',
            'procurement_id.*' => 'required|exists:procurements,id',
            'goods_amount.*' => 'required|integer|min:1',
            'tgl_exp_date.*' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
            'nama_penerima' => 'nullable|string',
        ]);

        $fileBast = $request->file('file_bast');
        $fileBastPath = $fileBast ? $fileBast->store('bast_files', 'public') : null;

        DB::transaction(function () use ($request, $fileBastPath) {
            $goodshandover = GoodsHandover::create([
                'date_received' => $request->date_received,
                'no_bast' => $request->no_bast,
                'file_bast' => $fileBastPath,
                'description' => $request->description,
                'user_id' => $request->user_id
            ]);

            $pengirim = Pengirim::create([
                'user_id' => $request->pengirim,
                'nama_pengirim' => $request->nama_pengirim,
                'NIP' => $request->NIP,
                'pangkat' => $request->pangkat,
                'jabatan' => $request->jabatan,
                'alamat_pengirim' => $request->alamat_pengirim
            ]);

            $penerimaData = [
                'nama_penerima' => $request->nama_penerima,
                'alamat_penerima' => $request->alamat_penerima,
            ];

            if ($request->filled('penerima')) {
                $penerimaData['user_id'] = $request->penerima;
            }
            if ($request->filled('NIP_pks')) {
                $penerimaData['NIP'] = $request->NIP_pks;
            }
            if ($request->filled('pangkat_pks')) {
                $penerimaData['pangkat'] = $request->pangkat_pks;
            }
            if ($request->filled('jabatan_pks')) {
                $penerimaData['jabatan'] = $request->jabatan_pks;
            }

            $penerima = Penerima::create($penerimaData);

            $namaPenerima = $request->nama_penerima ?: User::find($request->penerima)->name;
            $namaPengirim = User::find($request->pengirim)->name;

            $detailsData = [];
            $pencatatanMasuk = [];
            $pencatatanKeluar = [];

            foreach ($request->goods_id as $index => $goodsId) {
                $detailsData[] = [
                    'id' => Uuid::uuid4()->toString(),
                    'goods_handover_id' => $goodshandover->id,
                    'goods_id' => $goodsId,
                    'unit_id' => $request->unit_id[$index],
                    'procurement_id' => $request->procurement_id[$index],
                    'goods_amount' => $request->goods_amount[$index],
                    'tgl_exp_date' => $request->tgl_exp_date[$index],
                    'pengirim_id' => $pengirim->id,
                    'penerima_id' => $penerima->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                $stockPengirim = GoodsSupply::where('goods_id', $goodsId)
                    ->where('unit_id', $request->unit_id[$index])
                    ->where('user_id', $request->pengirim)
                    ->first();

                $sisaBarangPengirim = $stockPengirim ? $stockPengirim->stock : 0;

                $pencatatanKeluar[] = [
                    'id' => Uuid::uuid4()->toString(),
                    'goods_id' => $goodsId,
                    'goods_entry' => 0,
                    'goods_out' => $request->goods_amount[$index],
                    'tgl_exp_date' => $request->tgl_exp_date[$index],
                    'description' => 'Kirim ke ' . $namaPenerima . ' dengan No.BAST ' . $request->no_bast,
                    'sisa_barang' => $sisaBarangPengirim - $request->goods_amount[$index],
                    'user_id' => $request->pengirim,
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                if ($stockPengirim) {
                    $stockPengirim->stock -= $request->goods_amount[$index];
                    $stockPengirim->updated_at = now();
                    $stockPengirim->save();
                }

                if ($request->filled('penerima')) {
                    $stockPenerima = GoodsSupply::where('goods_id', $goodsId)
                        ->where('unit_id', $request->unit_id[$index])
                        ->where('user_id', $request->penerima)
                        ->first();

                    $sisaBarangPenerima = $stockPenerima ? $stockPenerima->stock : 0;

                    $pencatatanMasuk[] = [
                        'id' => Uuid::uuid4()->toString(),
                        'goods_id' => $goodsId,
                        'goods_entry' => $request->goods_amount[$index],
                        'goods_out' => 0,
                        'tgl_exp_date' => $request->tgl_exp_date[$index],
                        'description' => 'Terima dari ' . $namaPengirim . ' dengan No.BAST ' . $request->no_bast,
                        'sisa_barang' => $sisaBarangPenerima + $request->goods_amount[$index],
                        'user_id' => $request->penerima,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    if ($stockPenerima) {
                        $stockPenerima->stock += $request->goods_amount[$index];
                        $stockPenerima->updated_at = now();
                        $stockPenerima->save();
                    } else {
                        GoodsSupply::create([
                            'id' => Uuid::uuid4()->toString(),
                            'goods_id' => $goodsId,
                            'unit_id' => $request->unit_id[$index],
                            'user_id' => $request->penerima,
                            'stock' => $request->goods_amount[$index],
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
                }
            }

            GoodsHandoverDetails::insert($detailsData);
            GoodsRecording::insert(array_merge($pencatatanMasuk, $pencatatanKeluar));
        });

        return redirect()->route('serahterima.index')->with('success', 'Data berhasil disimpan');
    }




    public function edit($id)
    {
        $handover = GoodsHandover::findOrFail($id);
        $handoverDetails = GoodsHandoverDetails::where('goods_handover_id', $id)->get();
        $barang = Goods::all();
        $unit = Unit::all();
        $pengadaan = Procurement::all();
        $warehouse = Warehouse::all();

        return view('pages.admin.pencatatan.GoodsHandover.edit', compact('handover', 'handoverDetails', 'barang', 'unit', 'pengadaan', 'warehouse'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date_received' => 'required|date',
            'no_bast' => 'required|string|max:255',
            'description' => 'nullable|string',
            'goods_id.*' => 'required|exists:goods,id',
            'unit_id.*' => 'required|exists:units,id',
            'procurement_id.*' => 'required|exists:procurements,id',
            'warehouse_id.*' => 'required|exists:warehouses,id',
            'goods_amount.*' => 'required|numeric',
            'tgl_exp_date.*' => 'required|date',
        ]);

        $handover = GoodsHandover::findOrFail($id);

        $handover->update([
            'date_received' => $request->date_received,
            'no_bast' => $request->no_bast,
            'file_bast' => $request->file_bast,
            'description' => $request->description,
        ]);


        foreach ($request->goods_id as $index => $goodsId) {
            $detail = GoodsHandoverDetails::where('goods_handover_id', $handover->id)
                ->find($request->detail_id[$index]);

            if ($detail) {
                $detail->update([
                    'goods_id' => $goodsId,
                    'unit_id' => $request->unit_id[$index],
                    'procurement_id' => $request->procurement_id[$index],
                    'warehouse_id' => $request->warehouse_id[$index],
                    'goods_amount' => $request->goods_amount[$index],
                    'tgl_exp_date' => $request->tgl_exp_date[$index],
                ]);
            }
        }

        return redirect()->route('serahterima.index')->with('success', 'Data Serah Terima Barang berhasil diupdate.');
    }

    public function show(string $id)
    {
        $umum = GoodsHandover::findOrFail($id);
        $handoverDetails = GoodsHandoverDetails::where('goods_handover_id', $id)->get();
        $barang = Goods::whereIn('id', $handoverDetails->pluck('goods_id'))->get();
        $unit = Unit::whereIn('id', $handoverDetails->pluck('unit_id'))->get();
        $pengadaan = Procurement::whereIn('id', $handoverDetails->pluck('procurement_id'))->get();

        return view('pages.admin.pencatatan.GoodsHandover.show', compact('handoverDetails', 'unit', 'pengadaan', 'barang', 'umum'));
    }


    public function destroy($id)
    {
        $serahterima = GoodsHandover::find($id);
        $serahterima->details()->delete();
        $serahterima->delete();
        return response()->json([
            'success' => 'Data Berhasil Dihapus ' . $id
        ]);
    }

    public function export_pdf($id)
    {
        $umum = GoodsHandover::findOrFail($id);
        $handoverDetails = GoodsHandoverDetails::where('goods_handover_id', $id)->get();
        $barangIds = $handoverDetails->pluck('goods_id');
        $pengirimIds = $handoverDetails->pluck('pengirim_id');
        $penerimaIds = $handoverDetails->pluck('penerima_id');

        $barang = Goods::whereIn('id', $barangIds)->get();
        $pengirim = Pengirim::whereIn('id', $pengirimIds)->first();
        $penerima = Penerima::whereIn('id', $penerimaIds)->first();

        $data = [
            'umum' => $umum,
            'handoverDetails' => $handoverDetails,
            'barang' => $barang,
            'pengirim' => $pengirim,
            'penerima' => $penerima
        ];

        $pdf = PDF::loadView('pages.admin.pencatatan.GoodsHandover.pdf', $data);

        return $pdf->download('BERITA-ACARA-SERAH-TERIMA.pdf');
    }


    public function excel()
    {
        return Excel::download(new serahTerimaExport, 'serahTerimaBarang.xlsx');
    }



    // fungsi approval

    //  get serah terima dan detailnya

    // mencatat stock barang
    // id barang, id gudang, unit, jumlah
    // find barang
    // if ada stock + goods_amount else data baru

    // keluar masuk
    // id barang, id gudang, jumlah barang masuk, jumlah barang keluar, gudang asal, gudang tujuan, tanggal
    // $pencatatanMasuk[] = [
    //     'goods_id' => $goodsId,
    //     'goods_entry' => $request->goods_amount[$index],
    //     'goods_out' => 0,
    //     // gudang asal
    //     // gudang tujuan
    //     'description' => 'Serah Terima Barang',
    //     'created_at' => now(),
    //     'updated_at' => now()
    // ];

    // $pencatatanKeluar[] = [


    // 10 obat mixagrip dari gudang A ke gudang B
    // id barang, id gudang, jumlah barang masuk, jumlah barang keluar, gudang asal, gudang tujuan, tanggal
    // 1, 1, 10, 0, A, B, 2021-09-01
    // 1, 2, 0, 10, B, A, 2021-09-01








    # FLOW PENGAJUAN OLEH PUSKESWAN
    // -------------------------------------------------------
    // Puskeswan      -> Puskeswan membuat BAST
    //                             |
    //                             |
    //                             |
    // -------------------------------------------------------
    // Admin KABUPATEN             -> Aproval BAST
    //                                     [ Input serah terima -> input stock -> input pencatatan ]


    // # FLOW PENERIMAAN BARANG DARI PUSAT [Nasional]
    // -------------------------------------------------------
    // Admin KABUPATEN             -> Membuat BAST
    //                                     [ Input serah terima -> input stock -> input pencatatan ]


}
