@extends('layouts.app')

@section('title', 'iSamVi Store | Dashboard')

@push('scripts')
    {{-- SweetAlert untuk login sukses --}}
    @if (session('login_success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: 'Login Berhasil!',
                text: 'Anda telah diarahkan ke dashboard.',
                icon: 'success',
                showConfirmButton: true
            });
        </script>
    @endif
@endpush

@section('konten')
    <div class="text-center my-4">
        <h2 class="fw-bold">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-muted">Semoga harimu menyenangkan 🎉</p>
    </div>

    <div class="row justify-content-center">
        {{-- Card Info --}}
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                        <i class="fas fa-box text-white fa-2x"></i>
                    </div>
                    <h3 class="fw-bold mb-1" id="jumlah-produk" data-count="{{ $jumlahProduk }}">0</h3>
                    <p class="text-muted mb-0">Jumlah Produk</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                        <i class="fas fa-users text-white fa-2x"></i>
                    </div>
                    <h3 class="fw-bold mb-1" id="jumlah-user" data-count="{{ $jumlahUser }}">0</h3>
                    <p class="text-muted mb-0">Jumlah User</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="bg-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                        <i class="fas fa-clipboard text-white fa-2x"></i>
                    </div>
                    <h3 class="fw-bold mb-1" id="jumlah-kategori" data-count="{{ $jumlahKategori }}">0</h3>
                    <p class="text-muted mb-0">Jumlah Kategori</p>
                </div>
            </div>
        </div>
    </div>
@endsection
