@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}            
         </div>                                       
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('task_success'))
    <div class="alert alert-success">
        {{session('task_success')}}
    </div>
@endif

@if(session('deleted'))
    <div class="alert alert-success">
        {{session('deleted')}}
    </div>
@endif

@if(session('updated'))
    <div class="alert alert-success">
        {{session('updated')}}
    </div>
@endif

@if(session('signup-success'))
    <div class="alert alert-success">
        {{session('signup-success')}}
    </div>
@endif

@if(session('signin-success'))
    <div class="alert alert-success">
        {{session('signin-success')}}
    </div>
@endif

@if(session('logout-success'))
    <div class="alert alert-success">
        {{session('logout-success')}}
    </div>
@endif

@if(session('signin-faliure'))
    <div class="alert alert-danger">
        {{session('signin-faliure')}}
    </div>
@endif

@if(session('login-first'))
    <div class="alert alert-danger">
        {{session('login-first')}}
    </div>
@endif