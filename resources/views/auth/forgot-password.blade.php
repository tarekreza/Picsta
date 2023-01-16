@extends('master')
@section('content')
    <div class="col-md-6 mx-auto mt-5">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Password reset</h3>
            </div>
          
            <form method="POST" id="quickForm" action="{{ route('password.email') }}">
                @csrf
                <div class="card-body">
                    <h6>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h6>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter email">
                    </div>
                </div>
                   

                    <div class="card-footer d-flex justify-content-end ">
                        <button type="submit" class="btn btn-danger ml-4 ">Submit</button>
                    </div>

            </form>
        </div>
    </div>



@endsection