<?php

namespace App\Http\Controllers\Pengadaan;

use App\Http\Controllers\Controller;
use App\Models\Master\Procurement;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{

    public function index()
    {
        $pengadaan = Procurement::orderBy('created_at', 'DESC')->get();
 
        return view('pages.admin.master.pengadaan.index', compact('pengadaan'));
    }
 

    public function create()
    {
        return view('pages.admin.master.pengadaan.create');
    }

    public function store(Request $request)
    {
        Procurement::create($request->all());
 
        return redirect()->route('pengadaan.index')->with('success', 'pengadaan added successfully');
    }

    public function show(string $id)
    {
        $pengadaan = Procurement::findOrFail($id);
 
        return view('pages.admin.master.pengadaan.show', compact('pengadaan'));
    }
 

    public function edit(string $id)
    {
        $pengadaan = Procurement::findOrFail($id);
 
        return view('pages.admin.master.pengadaan.edit', compact('pengadaan'));
    }
 

    public function update(Request $request, string $id)
    {
        $pengadaan = Procurement::findOrFail($id);
 
        $pengadaan->update($request->all());
 
        return redirect()->route('pengadaan.index')->with('success', 'pengadaan updated successfully');
    }
 

    public function destroy(string $id)
    {
        $pengadaan = Procurement::findOrFail($id);
 
        $pengadaan->delete();
 
        return redirect()->route('pengadaan.index')->with('success', 'pengadaan deleted successfully');
    }
}
