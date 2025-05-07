@extends('layouts.app')

@section('title', 'iSamVi Store | Tambah Kategori')

@section('konten')
    <div class="container-fluid px-4">
        <h4 class="mt-4">Tambah Kategori</h4>
        <div class="mb-4"></div>
        <form action="{{ route('kategori.store') }}" class="form-tambah" method="post">
            @csrf
            <div class="card shadow bg-white">
                <div class="card-header">
                    <strong>Data Kategori</strong>
                </div>

                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Kategori:</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori"
                                required>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-primary btn-tambah">
                                <i class="bi bi-check-square"></i> Tambah
                            </button>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ url('/kategori') }}" class="btn btn-sm btn-success">&laquo; Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
