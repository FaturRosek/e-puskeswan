<?php

namespace App\Http\Controllers\Satuan;

use App\Http\Controllers\Controller;
use App\Models\Master\Unit;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan = Unit::orderBy('created_at', 'DESC')->get();
 
        return view('pages.admin.master.satuan.index', compact('satuan'));
    }
 
    public function create()
    {
        return view('pages.admin.master.satuan.create');
    }
 
    public function store(Request $request)
    {
        Unit::create($request->all());
 
        return redirect()->route('satuan.index')->with('success', 'satuan added successfully');
    }
 
    public function show(string $id)
    {
        $satuan = Unit::findOrFail($id);
 
        return view('pages.admin.master.satuan.show', compact('satuan'));
    }
 
    public function edit(string $id)
    {
        $satuan = Unit::findOrFail($id);
 
        return view('pages.admin.master.satuan.edit', compact('satuan'));
    }
 
    public function update(Request $request, string $id)
    {
        $satuan = Unit::findOrFail($id);
 
        $satuan->update($request->all());
 
        return redirect()->route('satuan.index')->with('success', 'satuan updated successfully');
    }
 
    public function destroy(string $id)
    {
        $satuan = Unit::findOrFail($id);
 
        $satuan->delete();
 
        return redirect()->route('satuan.index')->with('success', 'satuan deleted successfully');
    }
}
