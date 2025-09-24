<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcement = Announcement::orderBy('created_at', 'DESC')->get();
 
        return view('pages.admin.setting.Announcement.index', compact('announcement'));
    }
 

    public function create()
    {
        return view('pages.admin.setting.Announcement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('announcements', 'public');
        }
    
        Announcement::create($data);
 
        return redirect()->route('announcement.index')->with('success', 'announcement added successfully');
    }

    public function show(string $id)
    {
        $announcement = Announcement::findOrFail($id);
 
        return view('pages.admin.setting.Announcement.show', compact('announcement'));
    }
 

    public function edit(string $id)
    {
        $announcement = Announcement::findOrFail($id);
 
        return view('pages.admin.setting.Announcement.edit', compact('announcement'));
    }
 

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $announcement = Announcement::findOrFail($id);
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($announcement->image) {
                Storage::disk('public')->delete($announcement->image);
            }
            // Store the new image
            $data['image'] = $request->file('image')->store('announcements', 'public');
        }
    
        $announcement->update($data);
    
        return redirect()->route('announcement.index')->with('success', 'Announcement updated successfully');
    
    }
 

    public function destroy(string $id)
    {
        $announcement = Announcement::findOrFail($id);
 
        $announcement->delete();
 
        return redirect()->route('announcement.index')->with('success', 'announcement deleted successfully');
    }
}
