<?php

namespace App\Http\Controllers;

use App\Models\Master\Goods;
use App\Models\Master\GoodsType;
use App\Models\Pencatatan\GoodsHandover;
use App\Models\Pencatatan\GoodsHandoverDetails;
use App\Models\Pencatatan\GoodsSupply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPuskeswanController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalJenisObat = GoodsSupply::where('user_id', $userId)->distinct('goods_id')->count('goods_id');

        $totalJenisBarang = GoodsSupply::where('user_id', $userId)
            ->with('goods.goodsType')
            ->get()
            ->pluck('goods.goodsType.id')
            ->unique()
            ->count();

        $totalStokObat = GoodsSupply::where('user_id', $userId)->sum('stock');

        $serahTerima = GoodsHandover::where('user_id', $userId)->get();
        $barang = GoodsSupply::where('user_id', $userId)->get();

        return view('pages.puskeswan.dashboard.index', compact('totalJenisObat', 'totalStokObat', 'totalJenisBarang', 'serahTerima', 'barang'));
    }

}
