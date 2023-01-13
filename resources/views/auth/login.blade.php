@extends('master')
@section('content')
    <div class="col-md-6 mx-auto mt-5">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Log in</h3>
            </div>
            <form method="POST" id="quickForm" action="{{ route('login') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>
                </div>
                   

                    <div class="card-footer d-flex justify-content-end ">

                        @if (Route::has('password.request'))
                        <a class="my-auto" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>

                    @endif
                        <button type="submit" class="btn btn-danger ml-4 ">Submit</button>
                    </div>

            </form>
        </div>
    </div>



@endsection