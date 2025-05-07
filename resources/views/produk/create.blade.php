@extends('layouts.app')

@section('title', 'iSamvi Store | Tambah Produk')

@section('konten')
    <div class="container-fluid px-4">
        <h4 class="mt-4">Tambah Produk</h4>
        <div class="mb-4"></div>
        <form action="{{ route('produk.store') }}" method="post" class="row g-3 mt-3" enctype="multipart/form-data">
            @csrf
            <div class="card shadow bg-white">
                <div class="card-header">
                    <strong>Isi Data Produk</strong>
                </div>
                <div class="card-body">

                    {{-- Kategori --}}
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Kategori:</label>
                        <div class="col-sm-9">
                            <select name="kategori_id" id="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Nama Produk --}}
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Produk:</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk"
                                required>
                        </div>
                    </div>

                    {{-- Harga --}}
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Harga:</label>
                        <div class="col-sm-9">
                            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                        </div>
                    </div>

                    {{-- Stock --}}
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Stock:</label>
                        <div class="col-sm-9">
                            <input type="number" name="stock" class="form-control" placeholder="Stock" required>
                        </div>
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Gambar:</label>
                        <div class="col-sm-9">
                            <input type="file" name="nama_file" class="form-control" placeholder="Gambar" required>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Dekripsi:</label>
                        <div class="col-sm-9">
                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" rows="4" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-primary btn-tambah"><i
                                    class="bi bi-check-square"></i> Tambah</button>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ url('/produk') }}" class="btn btn-sm btn-success">&laquo; Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
