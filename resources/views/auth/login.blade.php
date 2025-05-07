@extends('layouts.guest')

@section('title', 'iSamVi Store | Login')

@section('logo', 'Login')

@section('konten')
    @php
        $emailValid = old('email') && !$errors->has('email');
        $passwordValid = old('password') && !$errors->has('password');
    @endphp

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- USERNAME --}}
        <div class="form-floating mb-3">
            <input
                class="form-control @error('username') is-invalid @enderror {{ old('username') && !$errors->has('username') ? 'is-valid' : '' }}"
                id="username" type="text" name="username" value="{{ old('username') }}" placeholder="username" />
            <label for="username">Masukkan Username</label>

            @error('username')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="invalid-feedback">
                Please enter your username.
            </div>

            @if (old('username') && !$errors->has('username'))
                <div class="valid-feedback">
                    Looks good!
                </div>
            @endif
        </div>

        {{-- PASSWORD --}}
        <div class="form-floating mb-3 position-relative">
            <input class="form-control @error('password') is-invalid @enderror {{ $passwordValid ? 'is-valid' : '' }}"
                id="password" type="password" name="password" value="{{ old('password') }}" placeholder="Password"
                oninput="toggleEyeIcon(this)" />
            <label for="password">Masukkan Password</label>

            {{-- Eye icon --}}
            <span id="eyeIconContainer" class="position-absolute top-50 end-0 translate-middle-y me-3"
                onclick="togglePassword()" style="cursor: pointer; display: none;">
                <i class="fas fa-eye" id="togglePasswordIcon"></i>
            </span>

            @error('password')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="invalid-feedback">
                Please enter your password.
            </div>

            @if ($passwordValid)
                <div class="valid-feedback">
                    Looks good!
                </div>
            @endif
        </div>

        {{-- REMEMBER ME --}}
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Ingat saya
            </label>
        </div>

        {{-- BUTTON --}}
        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>
        </div>

    @section('perintah-register', 'Belum memiliki akun? Silahkan buat akun!')
    </form>
@endsection

@push('scripts')

{{-- Logout-success --}}
@if (session('logout_success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Logout Berhasil!',
            text: 'Sampai jumpa kembali 👋',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif

{{-- Register-success --}}
@if (session('register_success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Registrasi Berhasil!',
            text: '{{ session('register_success') }}',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('togglePasswordIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    function toggleEyeIcon(input) {
        const iconContainer = document.getElementById('eyeIconContainer');
        if (input.value.length > 0) {
            iconContainer.style.display = 'block';
        } else {
            iconContainer.style.display = 'none';
        }
    }

    window.onload = () => {
        const input = document.getElementById('password');
        toggleEyeIcon(input);
    }
</script>
@endpush
