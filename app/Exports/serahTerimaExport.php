<?php

namespace App\Exports;

use App\Models\Pencatatan\GoodsHandover;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;


class serahTerimaExport implements FromView
{

    public function view(): View
    {
        $userId = Auth::id();
        $data = GoodsHandover::where('user_id', $userId)->get();
        
        return view('pages.admin.pencatatan.GoodsHandover.excel', ['data' => $data]);
    }
}
