<?php

namespace App\Exports;

use App\Models\Pencatatan\GoodsHandover;
use App\Models\Pencatatan\GoodsRecording;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class ExportPencatatan implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $userId = Auth::id();
        $data = GoodsRecording::where('user_id', $userId)
                                ->orderBy('created_at', 'asc')
                                ->get();
                return view('pages.admin.pencatatan.GoodsRecording.table', ['data' => $data]);
    }
}
