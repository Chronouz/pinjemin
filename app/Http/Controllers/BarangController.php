<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_path' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'location' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'condition' => 'required|string',
            'link' => 'required|url',
        ]);

        Barang::create($validated);

        return redirect()->route('barang.index')->with('success', 'Barang created successfully.');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'image_path' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'location' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'condition' => 'required|string',
            'link' => 'required|url',
        ]);

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Barang updated successfully.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang deleted successfully.');
    }
}
