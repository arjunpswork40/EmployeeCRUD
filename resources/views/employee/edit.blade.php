@extends('layouts.dashboard')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action ="{{ route('employee.update', $employee->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" value="{{ old('name', $employee->name)}}" id="exampleInputEmail1" placeholder="Enter name" name="name">
                        @error('name')
                            <span id="full_name-error" class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value="{{ old('email', $employee->email)}}" id="exampleInputEmail1" placeholder="Enter email" name="email">
                    @error('email')
                        <span id="full_name-error" class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  
                  <div class="form-group">
                        <label>Select Designation</label>
                        <select class="form-control" name="designation_id">
                            @foreach($designations as $designation)
                                <option value={{ $designation->id}} {{ old('designation_id', $employee->designation_id) == $designation->id ? 'selected' : '' }}>{{ $designation->name}}</option>
                            @endforeach
                          
                        </select>
                      </div>
                      <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo" accept="image/png, image/jpeg, 'image/jpg, 'image/svg" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                     @error('photo')
                        <span id="full_name-error" class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                        <img class="user-image img-circle elevation-2" style="width:100px; height:100px;" src="{{ EmployeeHelper::getImagePath($employee->photo)}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div></div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('bower_components/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
        $(function () {
        bsCustomFileInput.init();
        });
</script>
@endpush