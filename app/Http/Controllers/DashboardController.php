<?php

namespace App\Http\Controllers;

use App\Livewire\Pencatatan\GoodsHandover;
use App\Models\Master\Goods;
use App\Models\Master\GoodsType;
use App\Models\Pencatatan\GoodsHandoverDetails;
use Illuminate\Http\Request;
use App\Models\Master\Puskeswan;
use App\Models\Pencatatan\Warehouse;
use App\Models\Pencatatan\GoodsSupply;

class DashboardController extends Controller
{

    public function index()
    {
        $userId = auth()->user()->id;

        $totalPuskeswan = Puskeswan::count();

        $totalGudang = GoodsType::count();

        $totalStokObat = GoodsSupply::where('user_id', $userId)->sum('stock');

        $puskeswan = Puskeswan::all();

        $barang = Goods::all();

        $serahTerima = GoodsHandoverDetails::all();

        return view('pages.admin.dashboard.index', compact('puskeswan', 'totalPuskeswan', 'totalGudang', 'totalStokObat', 'serahTerima'));
    }
}

