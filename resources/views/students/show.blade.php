@extends('templates.layout', ['title' => 'Tampilkan || Data Siswa'])
@section('content')

<div class="card shadow-lg rounded-lg border-0 mt-5">
    <div class="card-header text-white" style="background: linear-gradient(45deg, #4e54c8, #8f94fb);">
        <h3 class="text-center mb-0">Lihat Informasi Siswa</h3>
    </div>
    <div class="card-body p-4">

        <form action="{{ url('student/' .$students->id) }}" method="post">
            @csrf
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
                <button type="button" class="btn btn-primary rounded-pill px-5 py-2 shadow-sm font-weight-bold" onclick="printForm()">Cetak</button>
            </div>
        </form>

    </div>
</div>

<script>
function printForm() {
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<!DOCTYPE html><html><head><title>Cetak Informasi Siswa</title></head><body>');
    printWindow.document.write('<div style="margin: 20px;">');
    printWindow.document.write('<h2>Informasi Siswa</h2>');
    printWindow.document.write('<p><strong>Nama:</strong> ' + document.getElementById('name').value + '</p>');
    printWindow.document.write('<p><strong>Alamat:</strong> ' + document.getElementById('address').value + '</p>');
    printWindow.document.write('<p><strong>Nomor Seluler:</strong> ' + document.getElementById('mobile').value + '</p>');
    printWindow.document.write('</div>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>

@endsection
