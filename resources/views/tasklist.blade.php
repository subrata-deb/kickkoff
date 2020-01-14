@extends('layouts.app')

@section ('content')
    <h1>Talk List</h1>

    {!! Form::open(['url' => 'tasklist/submit']) !!}
    
    <p>Enter Your Task</p>
        <div class="form-group">
            {{Form::label('taskname', 'Task Name')}}
            {{Form::text('taskname', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Task Name:'] )}}
        </div>

        <div class="form-group">
            {{Form::label('priority', 'Priority')}}
            {{Form::text('priority', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Priority'] )}}
        </div>

        <div class="form-group">
            {{Form::label('place', 'Place')}}
            {{Form::text('place', '', ['class' => 'form-control', 'placeholder' => 'Enter Place'] )}}
        </div>

        <div class="form-group">
            {{Form::label('responsibility', 'Responsibility')}}
            {{Form::text('responsibility', '', ['class' => 'form-control', 'placeholder' => 'Responsibility of'] )}}
        </div>

        {{Form::submit('Submit Task' , ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}


    <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
                <h2>"All Tasks"</h2>
                
                        
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Task Name</th>
                                    <th>Priority</th>
                                    <th>Place</th>
                                    <th>Responsibility of</th>
                                    <th>Delete Button</th>
                                    <th>Update Button</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($tasks) > 0)
                                    @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->taskname}}</td>
                                    <td>{{$task->priority}}</td>
                                    <td>{{$task->place}}</td>
                                    <td>{{$task->responsibility}}</td>
                                    <th><form action="{{ url('tasklist/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                    </th>
                                    <th>{{Form::submit('Update' , ['class' => 'btn btn-primary'])}}</th>
                                </tr>
                                    @endforeach
                                @endif           
                            </tbody>
                        </table>
                        </div>
                    
        </div>
    
          
    </div>    
</div>
@endsection

@section ('sidebar')
    
@endsection