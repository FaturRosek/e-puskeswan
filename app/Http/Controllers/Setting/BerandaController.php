<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\Beranda;
use Illuminate\Support\Facades\File;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::get();
        return view('pages.admin.setting.beranda.index', compact('beranda'));
    }

    public function create()
    {
        return view('pages.admin.setting.beranda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255|string',
            'sub_judul' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:3048', 
        ]);

        $filename = NULL;
        $path = 'uploads/beranda/';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);
        }

        Beranda::create([
            'judul' => $request->judul,
            'sub_judul' => $request->sub_judul,
            'image' => $filename ? $path . $filename : NULL,
        ]);

        return redirect()->route('beranda.index')->with('status', 'Beranda Created');
    }

    public function edit(int $id)
    {
        $beranda = Beranda::findOrFail($id);
        return view('pages.admin.setting.beranda.edit', compact('beranda'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'judul' => 'required|max:255|string',
            'sub_judul' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:3048', 
        ]);

        $beranda = Beranda::findOrFail($id);

        $filename = $beranda->image; 
        $path = 'uploads/beranda/';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);

            
            if (File::exists($beranda->image)) {
                File::delete($beranda->image);
            }
        }

        $beranda->update([
            'judul' => $request->judul,
            'sub_judul' => $request->sub_judul,
            'image' => $filename ? $path . $filename : $beranda->image,
        ]);

        return redirect()->route('beranda.index')->with('status', 'Beranda Updated');
    }

    public function show(int $id)
    {
        $beranda = Beranda::findOrFail($id);
        return view('pages.admin.setting.beranda.show', compact('beranda'));
    }

    public function destroy(int $id)
    {
        $beranda = Beranda::findOrFail($id);
        if (File::exists($beranda->image)) {
            File::delete($beranda->image);
        }

        $beranda->delete();

        return redirect()->route('beranda.index')->with('status', 'Beranda Deleted');
    }
}
