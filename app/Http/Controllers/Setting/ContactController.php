<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.setting.Contact.index', compact('contact'));
    }

    public function create()
    {
        $contact = Contact::all();
        return view('pages.admin.setting.Contact.create', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Contact::create([
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('pages.admin.setting.Contact.show', compact('contact'));
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('pages.admin.setting.Contact.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('contact.index')->with('success', 'Contact updated successfully');
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully');
    }
}
