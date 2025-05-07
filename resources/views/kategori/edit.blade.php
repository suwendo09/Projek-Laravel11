@extends('layouts.app')

@section('title', 'iSamVi Store | Edit Kategori')

@section('konten')
    <div class="container-fluid px-4">
        <h4 class="mt-4">Edit Kategori</h4>
        <div class="mb-4"></div>
        <form action="{{ route('kategori.update', $kategori->id) }}" class="form-edit" method="post">
            @csrf
            @method('PUT')
            <div class="card shadow bg-white">
                <div class="card-header">
                    <strong>Data Kategori</strong>
                </div>

                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Kategori:</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}"
                                class="form-control" placeholder="Nama Kategori" required>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-primary btn-edit">
                                <i class="bi bi-check-square"></i> Edit
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
