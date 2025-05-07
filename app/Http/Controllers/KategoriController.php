<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = kategori::get();
        $jumlahKategori = kategori::count();
        return view('kategori.index', compact('kategori', 'jumlahKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required|min:3|max:255',
        ]);

        kategori::create($validate);
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required|min:3|max:255',
        ]);

        $kategori->update($validate);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        $kategori = Kategori::findOrFail($kategori->id);
        $kategori->delete();    

    return redirect()->route('kategori.index');
    }
}
