<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Models\Setting\Pilihan;
use App\Http\Controllers\Controller;

class PilihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pilihans = Pilihan::all();
        return view('pages.admin.setting.pilihans.index', compact('pilihans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.setting.pilihans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'nama' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        // Create new Pilihan
        Pilihan::create($request->all());

        return redirect()->route('pilihans.index')
                         ->with('success', 'Pilihan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pilihan = Pilihan::findOrFail($id);
        return view('pages.admin.setting.pilihans.show', compact('pilihan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pilihan = Pilihan::findOrFail($id);
        return view('pages.admin.setting.pilihans.edit', compact('pilihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'nama' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        // Find existing Pilihan and update
        $pilihan = Pilihan::findOrFail($id);
        $pilihan->update($request->all());

        return redirect()->route('pilihans.index')
                         ->with('success', 'Pilihan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find existing Pilihan and delete
        $pilihan = Pilihan::findOrFail($id);
        $pilihan->delete();

        return redirect()->route('pilihans.index')
                         ->with('success', 'Pilihan berhasil dihapus.');
    }
}
