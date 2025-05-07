@extends('layouts.app')

@section('title', 'iSamVi Store | Produk')

@section('konten')
    <div class="container-fluid px-4">
        <h4 class="mt-4">Daftar Produk</h4>
        <h2>Jumlah Produk: <span id="jumlah-produk" class="fs-2 fw-bold" data-count="{{ $jumlahProduk }}">0</span></h2>
        <div class="mb-4"></div>
        <a href="{{ route('produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
        <div class="mb-4"></div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Produk
            </div>
            <div class="card-body">
                <table id="datatablesSimple" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr class="text-center align-middle">
                            <th style=" white-space: nowrap;">No</th>
                            <th>Nama Produk</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($produk->isEmpty())
                            <tr>
                                <td colspan="4" class="alert alert-danger text-center">
                                    Data Produk kosong.
                                </td>
                            </tr>
                        @else
                            @foreach ($produk as $no => $produk)
                                <tr class="align-middle text-center">
                                    <td class="text-center align-middle" style="white-space: nowrap;">{{ $no + 1 }}
                                    </td>
                                    <td class="text-start">{{ $produk->nama_produk }}</td>
                                    <td>
                                        <div
                                            style="width: 100px; height: 75px; overflow: hidden; display: flex; align-items: center; justify-content: center; margin: auto;">
                                            <img src="{{ asset('uploads/' . $produk->nama_file) }}" alt="gambar produk"
                                                style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                        </div>
                                    </td>
                                    <td class="text-start">Rp {{ number_format ($produk->harga, 0, ',', '.') }}</td>

                                    {{-- Aksi --}}
                                    <td class="text-center" width="150px">
                                        <div class="aksi-wrapper">
                                            <a href="{{ route('produk.show', $produk->id) }}"
                                                class="btn btn-info btn-sm btn-aksi">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                            <a href="{{ route('produk.edit', $produk->id) }}"
                                                class="btn btn-warning btn-sm btn-aksi">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm btn-delete btn-aksi">
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
