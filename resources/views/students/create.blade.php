@extends('students.layout')
@section('content')
 
<div class="card shadow-lg rounded-lg border-0 mt-5">
  <div class="card-header text-white" style="background: linear-gradient(45deg, #4e54c8, #8f94fb);">
    <h3 class="text-center mb-0">Add New Student</h3>
  </div>
  <div class="card-body p-4">
      
    <form action="{{ url('student') }}" method="post">
        {!! csrf_field() !!}

        <div class="form-group mb-4">
            <label for="name" class="font-weight-bold">Student Name</label>
            <input type="text" name="name" id="name" class="form-control rounded-pill shadow-sm" placeholder="Enter student's name" required>
        </div>
        
        <div class="form-group mb-4">
            <label for="address" class="font-weight-bold">Address</label>
            <input type="text" name="address" id="address" class="form-control rounded-pill shadow-sm" placeholder="Enter student's address" required>
        </div>
        
        <div class="form-group mb-4">
            <label for="mobile" class="font-weight-bold">Mobile Number</label>
            <input type="text" name="mobile" id="mobile" class="form-control rounded-pill shadow-sm" placeholder="Enter student's mobile number" required>
        </div>
        
        <div class="d-flex justify-content-between">
            <a href="{{ url('student') }}" class="btn btn-secondary rounded-pill px-5 py-2 shadow-sm font-weight-bold">Back</a>
            <input type="submit" value="Save" class="btn btn-success rounded-pill px-5 py-2 shadow-sm font-weight-bold">
        </div>
    </form>
   
  </div>
</div>
 
@endsection
