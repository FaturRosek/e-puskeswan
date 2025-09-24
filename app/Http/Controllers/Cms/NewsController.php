<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\Cms\NewsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Cms\News;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index(NewsDataTable $dataTable)
    {
        // dd($dataTable);
        $berita = News::orderBy('created_at', 'DESC')->get();
        return $dataTable->render('pages.admin.cms.news.index', compact('berita'));
    }

    public function create()
    {
        $berita = News::all();
        return view('pages.admin.cms.news.create', compact('berita'));
    }
    
    public function store(Request $request)
{
    // Validate request data
    $request->validate([
        'judul_berita' => 'required',
        'thumbnail' => 'required|file',
        'isi_berita' => 'required', 
    ]);

    
    $file = $request->file('thumbnail');
    $name = $file->getClientOriginalName();
    $tujuan_upload = 'data_file';

    try {
        if ($request->id != null) {
            // Update existing news record
            $berita = News::findOrFail($request->id);
            $berita->update([
                'title' => $request->judul_berita,
                'thumbnail' => $name,
                'description' => $request->isi_berita,
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
            News::create([
                'title' => $request->judul_berita,
                'thumbnail' => $name,
                'description' => $request->isi_berita,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
            if ($request->ajax()) {
                return response()->json(['success' => 'Berita Berhasil Ditambahkan']);
            } else {
                return redirect()->back()->with('success', 'Berita Berhasil Ditambahkan');
            }
        }
    } catch (\Exception $e) {
        dd('Error inserting or updating news: ' . $e->getMessage(), ['exception' => $e]);
    
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
            News::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.cms.news.index');
    }

    public function edit(string $id)
    {
        $berita = News::findOrFail($id);
 
        return view('pages.admin.cms.news.edit', compact('berita'));
    }
    
    public function update(Request $request, string $id)
    {
        $berita = News::findOrFail($id);
        $berita->title = $request->title;
        if($request->thumbnail!=null){
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $name);
        $berita->thumbnail = $name;
        }
        $berita->description = $request->description;
        $berita->save();
 
        return redirect()->route('berita.index')->with('success', 'News updated successfully');
    }
}

