<?php

namespace App\Http\Controllers\Setting;

use App\DataTables\Setting\VeterinaryProfileDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\VeterinaryProfile; // Correct namespace and capitalization
use DOMDocument;
use Illuminate\Support\Facades\Log;

class VeterinaryProfileController extends Controller
{
    public function index(VeterinaryProfileDataTable $dataTable)
{
    $profile = VeterinaryProfile::orderBy('created_at', 'DESC')->get();
    return $dataTable->render('pages.admin.setting.veterinary-profile.index', compact('profile')); // Correct view path
}

    public function create()
    {
        $profile = VeterinaryProfile::all();
        return view('pages.admin.setting.veterinary-profile.create', compact('profile'));
    }
    
    public function store(Request $request)
{
    // Validate request data
    $request->validate([
        'title' => 'required',
        'description' => 'required', 
        'photo' => 'required|file',
    ]);

    
    $file = $request->file('photo');
    $name = $file->getClientOriginalName();
    $tujuan_upload = 'profile_photo';

    try {
        if ($request->id != null) {
            // Update existing news record
            $profile = VeterinaryProfile::findOrFail($request->id);
            $profile->update([
                'title' => $request->title,
                'photo' => $name,
                'description' => $request->description,
                'updated_by' => auth()->user()->id,
            ]);
            $file->move($tujuan_upload, $name);
    
            // Return JSON response for AJAX request
            if ($request->ajax()) {
                return response()->json(['success' => 'News updated successfully']);
            } else {
                // Redirect back with success message for non-AJAX request
                return redirect()->back()->with('success', 'News updated successfully');
            }
        } else {
            $file->move($tujuan_upload, $name);
            VeterinaryProfile::create([
                'title' => $request->title,
                'photo' => $name,
                'description' => $request->description,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
            if ($request->ajax()) {
                return response()->json(['success' => 'Profil Puskeswan Berhasil Ditambahkan']);
            } else {
                return redirect()->back()->with('success', 'Profil Puskeswan Berhasil Ditambahkan');
            }
        }
    } catch (\Exception $e) {
        dd('Error inserting or updating Profile: ' . $e->getMessage(), ['exception' => $e]);
    
        if ($request->ajax()) {
            return response()->json(['error' => 'Terjadi kesalahan.'], 500);
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }    
}

public function destroy($id)
{
    try {
    VeterinaryProfile::findOrFail($id)->delete();
    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }

    return redirect()->route('profile.index');
}

public function edit(string $id)
{
    $profile = VeterinaryProfile::findOrFail($id);

    return view('pages.admin.setting.veterinary-profile.edit', compact('profile'));
}

public function update(Request $request, string $id)
{
    $profile = VeterinaryProfile::findOrFail($id);
    $profile->title = $request->title;
    if($request->photo!=null){
        $file = $request->file('photo');
        $name = $file->getClientOriginalName();
        $tujuan_upload = 'profile_photo';
        $file->move($tujuan_upload, $name);
    $profile->photo = $name;
    }
    $profile->description = $request->description;
    $profile->save();

    return redirect()->route('profile.index')->with('success', 'News updated successfully');
}
}
