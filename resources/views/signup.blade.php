@extends('layouts.app')

@section ('title')
Social Page!!
@endsection

@section ('content')

<div class="container-fluid text-center">


    <div class="row col-md-12 col-sm-offset-3">
        <h2>Create an Account! Sign Up!</h2>
        <div class="">
                    <form class="form-signup" action="{{ url('/signup') }}" method="POST">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign Up!</h1>

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="inputName" class="sr-only">Your Name</label>
                            <input type="text" name="name" id="inputName" class="form-control" value="{{ Request::old('name') }}" placeholder="Your Name" required autofocus>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input type="email" name="email" id="inputEmail" class="form-control" value="{{ Request::old('email') }}" placeholder="Email address" required autofocus>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" name="password" id="inputPassword" class="form-control" value="{{ Request::old('password') }}" placeholder="Password" required autofocus>
                        </div>

                        <div class="checkbox mb-3">
                            <label><input type="checkbox" value="remember-me"> Remember me</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}" >
                    </form>

        </div>
    </div>
</div>

@endsection

@section ('sidebar')
@endsection
