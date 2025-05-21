<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Majors;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Majors::all();
        return view('majors.index', compact('majors'));
    }
    public function show(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.show', compact('major'));
    }

    public function create()
    {
        return view('majors.create');
    }

    // Menyimpan data major baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:majors,code',
            'description' => 'required|string',
        ]);

        Majors::create($validated);

        return redirect()->route('majors.index')->with('success', 'Major created successfully');
    }

    // Menampilkan form edit major
    public function edit(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.update', compact('major'));
    }

    // Menyimpan perubahan major
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:majors,code,' . $id,
            'description' => 'required|string',
        ]);

        $major = Majors::findOrFail($id);
        $major->update($validated);

        return redirect()->route('majors.index')->with('success', 'Major updated successfully');
    }

    // Menghapus major
    public function destroy(string $id)
    {
        $major = Majors::findOrFail($id);
        $major->delete();

        return redirect()->route('majors.index')->with('success', 'Major deleted successfully');
    }
}
