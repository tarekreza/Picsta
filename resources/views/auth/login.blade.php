@extends('master')
@section('content')
    <div class="col-md-6 mx-auto mt-5">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Log in</h3>
            </div>
            <x-jet-validation-errors class="mt-3 ml-3" />
            <form method="POST" id="quickForm" action="{{ route('login') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full form-control" type="email" name="email"
                            :value="old('email')" required />            
                    </div>
                    <div class="form-group">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>
                </div>
                   

                    <div class="card-footer d-flex justify-content-end ">

                        @if (Route::has('password.request'))
                        <a class="my-auto" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>

                    @endif
                        <x-jet-button class="btn btn-danger ml-4">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>

            </form>
        </div>
    </div>



@endsection