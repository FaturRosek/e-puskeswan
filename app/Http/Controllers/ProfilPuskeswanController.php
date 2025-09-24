<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfilPuskeswanController extends Controller
{
    public function index()
    {
        $profil_puskeswan = Auth::user();
        return view('pages.puskeswan.profil.index', compact('profil_puskeswan'));
    }

    public function edit($id)
    {
        $profil_puskeswan = User::findOrFail($id);
        return view('pages.puskeswan.profil.edit', compact('profil_puskeswan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'current_password' => 'required|string',
            'new_password' => 'nullable|string|confirmed',
        ]);

        $profil_puskeswan = User::findOrFail($id);

        // Check if current password matches the one in the database
        if (!Hash::check($request->current_password, $profil_puskeswan->password)) {
            return redirect()->back()->with('error', 'Password saat ini salah.');
        }

        $profil_puskeswan->name = $request->name;
        $profil_puskeswan->email = $request->email;

        // Update password if new password is provided
        if ($request->new_password) {
            $profil_puskeswan->password = Hash::make($request->new_password);
        }

        $profil_puskeswan->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
