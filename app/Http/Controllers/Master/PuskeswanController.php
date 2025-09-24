<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\Master\PuskeswansDataTable;
use App\Models\Master\Puskeswan;

class PuskeswanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(PuskeswansDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.master.puskeswans.index');
    }

    public function create()
    {
        $users = User::all();
    
    // Kirim data puskeswan ke view
    return view('pages.admin.master.Puskeswans.modal', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'user_id' => 'required|string|max:255'
        ], [
            'name.required' => 'Nama harus diisi.',
            'address.required' => 'Alamat harus diisi.',
            'latitude.required' => 'Latitude harus diisi.',
            'longitude.required' => 'Longitude harus diisi.',
            'kelurahan.required' => 'Kelurahan harus diisi.',
            'kecamatan.required' => 'Kecamatan harus diisi.',
            'user_id.required' => 'User Id Harus diisi'
        ]);

        $validatedData['uuid'] = \Str::uuid();
        Puskeswan::create($validatedData);

        return redirect()->route('puskeswans.index')->with('success', 'Puskeswan berhasil ditambahkan.');
    }

    public function show(Puskeswan $puskeswan)
    {
        return view('pages.admin.master.puskeswans.show', compact('puskeswan'));
    }

    public function edit(Puskeswan $puskeswan)
    {
        return view('pages.admin.master.puskeswans.edit', compact('puskeswan'));
    }

    public function update(Request $request, Puskeswan $puskeswan)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'user_id' => 'required|string|max:255'
        ], [
            'name.required' => 'Nama harus diisi.',
            'address.required' => 'Alamat harus diisi.',
            'latitude.required' => 'Latitude harus diisi.',
            'longitude.required' => 'Longitude harus diisi.',
            'kelurahan.required' => 'Kelurahan harus diisi.',
            'kecamatan.required' => 'Kecamatan harus diisi.',
            'user_id.required' => 'User Id Harus diisi'
        ]);

        $puskeswan->update($validatedData);
        return redirect()->route('puskeswans.index')->with('success', 'Data Puskeswan berhasil diubah.');
    }

    public function destroy(Puskeswan $puskeswan)
    {
        $puskeswan->delete();
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Puskeswan berhasil dihapus.',
            ]);
        }

        return redirect()->route('puskeswans.index')->with('success', 'Puskeswan berhasil dihapus.');
    }
}
