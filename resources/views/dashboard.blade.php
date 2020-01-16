@extends('layouts.app')

@section ('title')
Welcome to Home page!
@endsection

@section ('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-5 col-lg-5">
                <h2>Welcome to Dashboard</h2>
                
        </div>
    
        <div class="col-md-3 col-lg-3">
                
        </div>    
    </div>    
</div>

@endsection

@section ('sidebar')
    @parent
@endsection
