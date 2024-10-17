@extends('students.layout')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header text-white text-center" style="background: linear-gradient(45deg, #4e54c8, #8f94fb);">
                        <h2 class="font-weight-bold">Student Management</h2>
                        <p class="lead">Efficiently manage your student data</p>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-muted">List of Students</h4>
                            <a href="{{ url('/student/create') }}" class="btn btn-success rounded-pill px-4 py-2 shadow-sm" title="Add New Student">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover text-center table-striped table-borderless">
                                <thead class="bg-gradient-dark text-white" style="background: linear-gradient(45deg, #4e54c8, #8f94fb);">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
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
                                            <a href="{{ url('/student/' . $item->id) }}" title="View Student" class="btn btn-info btn-sm rounded-pill shadow-sm">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                            <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Student" class="btn btn-primary btn-sm rounded-pill shadow-sm">
                                                <i class="fa fa-pencil-square-o"></i> Edit
                                            </a>

                                            <form method="POST" action="{{ url('/student' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm rounded-pill shadow-sm" title="Delete Student" onclick="return confirm('Confirm delete?')">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center text-muted">
                        <small>Empowering Student Data Management</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
