@extends('layouts.app')

@section('title', 'iSamVi Store | kategori')

@section('konten')
    <div class="container-fluid px-4">
        <h4 class="mt-4">Daftar Kategori</h4>
        <h2>Jumlah Kategori: <span id="jumlah-kategori" class="fs-2 fw-bold" data-count="{{ $jumlahKategori }}">0</span></h2>
        <div class="mb-4"></div>
        <a href="{{ route('kategori.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
        <div class="mb-4"></div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Kategori
            </div>
            <div class="card-body">
                <table id="datatablesSimple" style="table-layout: fixed; width: 100%; min-width ma-width">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="col-nama-kategori">Nama Kategori</th>
                            <th class="col-aksi col-aksi-kategori">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kategori->isEmpty())
                            <tr>
                                <td colspan="3" class="alert alert-danger text-center">
                                    Data kategori kosong.
                                </td>
                            </tr>
                        @else
                            @foreach ($kategori as $no => $kategori)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td class="col-aksi-kategori">{{ $kategori->nama_kategori }}</td>
                                    <td class="col-aksi col-aksi-kategori">
                                        <div class="d-flex justify-content-center gap-2 aksi-wrapper">
                                            <a href="{{ route('kategori.edit', $kategori->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger btn-delete">
                                                    <i class="bi bi-trash3-fill"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
