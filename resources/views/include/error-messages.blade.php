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