@extends('layouts.app')

@section ('title')
Social Page!!
@endsection

@section ('content')


<div class="container-fluid text-center">


    <div class="row col-md-12 col-sm-offset-3">
        <h2>Welcome to Social Network Page!</h2>
        <div class="">
        <form class="form-signin" action="{{ url('/signin') }}" method="POST">
                        <h1 class="h3 mb-3 font-weight-normal">Sign In!</h1>

                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="email" name="email"  value="{{ Request::old('email') }}" class="form-control" placeholder="Email address" required autofocus>

                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="password" name="password"  value="{{ Request::old('password') }}" class="form-control" placeholder="Password" required autofocus>

                        <div class="checkbox mb-3">
                            <label><input type="checkbox" value="remember-me"> Remember me</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit">login</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}" >
        </form>

        </div>
    </div>
</div>

@endsection

@section('sidebar')

@endsection
