@extends('templates.layout', ['title' => 'Masuk || Data Siswa'])
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-white text-center" style="background: linear-gradient(45deg, #4e54c8, #8f94fb);">
                    <h2 class="font-weight-bold">Masuk</h2>
                    <p class="lead">Akses akun Anda</p>
                </div>
                
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                        </div>
                    @endif
                    
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="nama@gmail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Masuk</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p>Belum punya akun? <a href="{{ route('register') }}" class="btn btn-link">Daftar</a></p>
                    </div>
                </div>

                <div class="card-footer text-center text-muted">
                    <small>Mengelola Data Siswa dengan Mudah</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
