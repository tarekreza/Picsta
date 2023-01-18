@extends('master')
@section('content')
<div class="col-md-8 mx-auto mt-5">

<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Upload Picture</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action = "{{ route('Images.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter Title">
          <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
          <span class="text-danger">{{ $errors->first('file') }}</span>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>
    </form>
  </div>

</div>
  @endsection