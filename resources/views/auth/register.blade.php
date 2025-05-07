@extends('layouts.guest')

@section('title', 'Leo Komputer | Register')

@section('logo', 'Register')

@section('konten')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nama --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
                        value="{{ old('name') }}" required placeholder="Enter your name" />
                    <label for="name">Nama</label>
                    @error('name')
                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                        type="text" value="{{ old('username') }}" required placeholder="Enter your username" />
                    <label for="username">Username</label>
                    @error('username')
                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Email --}}
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email"
                value="{{ old('email') }}" required placeholder="name@example.com" />
            <label for="email">Email</label>
            @error('email')
                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                        type="password" required placeholder="Create a password" />
                    <label for="password">Password</label>
                    @error('password')
                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
                        required placeholder="Confirm password" />
                    <label for="password_confirmation">Konfirmasi Password</label>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-0">
            <div class="d-grid">
                <button class="btn btn-primary btn-block" type="submit">Buat Akun</button>
            </div>
        </div>
    @section('perintah-login', 'Sudah memiliki akun? Silahkan login!')
</form>
@endsection
