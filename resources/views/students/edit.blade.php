@extends('templates.layout', ['title' => 'Edit || Data Siswa'])
@section('content')

<div class="card shadow-lg rounded-lg border-0 mt-5">
    <div class="card-header text-white" style="background: linear-gradient(45deg, #4e54c8, #8f94fb);">
        <h3 class="text-center mb-0">Perbarui Informasi Siswa</h3>
    </div>
    <div class="card-body p-4">
        
        <form action="{{ url('student/' .$students->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$students->id}}" class="form-control" />

            <div class="form-group mb-4">
                <label for="name" class="font-weight-bold">Nama Siswa</label>
                <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control rounded-pill shadow-sm" placeholder="Masukkan nama siswa" required>
            </div>
            
            <div class="form-group mb-4">
                <label for="address" class="font-weight-bold">Alamat</label>
                <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control rounded-pill shadow-sm" placeholder="Masukkan alamat siswa" required>
            </div>
            
            <div class="form-group mb-4">
                <label for="mobile" class="font-weight-bold">Nomor Seluler</label>
                <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control rounded-pill shadow-sm" placeholder="Masukkan nomor seluler siswa" required>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ url('student') }}" class="btn btn-secondary rounded-pill px-5 py-2 shadow-sm font-weight-bold">Kembali</a>
                <input type="submit" value="Perbarui" class="btn btn-success rounded-pill px-5 py-2 shadow-sm font-weight-bold">
            </div>
        </form>

    </div>
</div>

@endsection  
