<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::get();
        $jumlahProduk = produk::count();
        return view('produk.index', compact('produk', 'jumlahProduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori::get();
        return view('produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
            'nama_file' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        if ($request->hasFile('nama_file')) {
            $file = $request->file('nama_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
    
            $validate['nama_file'] = $filename;
        }

        produk::create($validate);
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        $kategori = kategori::get();
        return view('produk.show', compact('produk', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        $kategori = kategori::get();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk)
    {
        $validate = $request->validate([
            'nama_produk' => 'required|min:3|max:255',
            'deskripsi' => 'required|min:3|max:255',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
            'nama_file' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        if ($request->hasFile('nama_file')) {
            if ($produk->nama_file && file_exists(public_path('uploads/' . $produk->nama_file))) {
                unlink(public_path('uploads/' . $produk->nama_file));
            }
    
            $file = $request->file('nama_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
    
            $validate['nama_file'] = $filename;
        }

        $produk->update($validate);
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        if ($produk->nama_file && file_exists(public_path('uploads/' . $produk->nama_file))) {
            unlink(public_path('uploads/' . $produk->nama_file));
        }

        $produk = produk::findOrFail($produk->id);
        $produk->delete();
        return redirect()->route('produk.index');
    }
}
