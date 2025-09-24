<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pencatatan\Warehouse;

class GudangController extends Controller
{
    public function index()
    {
        $gudang = Warehouse::orderBy('created_at', 'DESC')->get();
 
        return view('pages.admin.master.gudang.index', compact('gudang'));
    }
 

    public function create()
    {
        return view('pages.admin.master.gudang.create');
    }

    public function store(Request $request)
    {
        Warehouse::create($request->all());
 
        return redirect()->route('gudang.index')->with('success', 'gudang added successfully');
    }

    public function show(string $id)
    {
        $gudang = Warehouse::findOrFail($id);
 
        return view('pages.admin.master.gudang.show', compact('gudang'));
    }
 

    public function edit(string $id)
    {
        $gudang = Warehouse::findOrFail($id);
 
        return view('pages.admin.master.gudang.edit', compact('gudang'));
    }
 

    public function update(Request $request, string $id)
    {
        $gudang = Warehouse::findOrFail($id);
 
        $gudang->update($request->all());
 
        return redirect()->route('gudang.index')->with('success', 'gudang updated successfully');
    }
 

    public function destroy(string $id)
    {
        $gudang = Warehouse::findOrFail($id);
 
        $gudang->delete();
 
        return redirect()->route('gudang.index')->with('success', 'gudang deleted successfully');
    }
}
