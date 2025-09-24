<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\Statistik;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        $Statistik = Statistik::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.setting.Statistik.index', compact('Statistik'));
    }


    public function edit(string $id)
{
    $Statistik = Statistik::findOrFail($id);
    return view('pages.admin.setting.Statistik.edit', compact('Statistik'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'tenaga_medis' => 'required|integer|min:0',
        'alat_medis' => 'required|integer|min:0',
        'total_puskeswan' => 'required|integer|min:0',
    ]);

    $Statistik = Statistik::findOrFail($id);
    $Statistik->update($request->all());

    return redirect()->route('statistik.index')->with('success', 'Tenaga Medis updated successfully');
}

}
