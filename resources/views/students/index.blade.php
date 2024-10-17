@extends('templates.layout', ['title' => 'Data Siswa'])
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-0 rounded-lg">

                    <div class="card-header text-white text-center" style="background: linear-gradient(45deg, #4e54c8, #8f94fb);">
                        <h2 class="font-weight-bold">Manajemen Siswa</h2>
                        <p class="lead">Kelola data siswa Anda dengan efisien</p>
                    </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-muted">Daftar Siswa</h4>
                            <a href="{{ url('/student/create') }}" class="btn btn-success rounded-pill px-4 py-2 shadow-sm" title="Tambah Siswa Baru">
                                <i class="fa fa-plus" aria-hidden="true"></i> Tambah Baru
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover text-center table-striped table-borderless">
                                <thead class="bg-gradient-dark text-white" style="background: linear-gradient(45deg, #4e54c8, #8f94fb);">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nomor Seluler</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $item)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->mobile }}</td>

                                        <td>
                                            <a href="{{ url('/student/' . $item->id) }}" title="Lihat Siswa" class="btn btn-info btn-sm rounded-pill shadow-sm">
                                                <i class="fa fa-eye"></i> Lihat
                                            </a>
                                            <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Siswa" class="btn btn-primary btn-sm rounded-pill shadow-sm">
                                                <i class="fa fa-pencil-square-o"></i> Edit
                                            </a>

                                            <form method="POST" action="{{ url('/student' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm rounded-pill shadow-sm" title="Hapus Siswa" onclick="return confirm('Konfirmasi hapus?')">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4">
                            {!! $students->links() !!}
                        </div>

                        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Keluar</button>
                        </form>
                    </div>

                    <div class="card-footer text-center text-muted">
                        <small>Memberdayakan Manajemen Data Siswa</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
