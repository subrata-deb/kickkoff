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
                                    <th>Direct Update</th>
                                    <th>Delete Button</th>
                                    <th>Update Button</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($tasks) > 0)
                                    @foreach($tasks as $task)
                                <tr>
                                <form action="{{ url('messages/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}

                                    <td>{{Form::text('taskname', $task->taskname, ['class' => 'form-control'] )}}</td>
                                    <td>{{Form::text('priority', $task->priority, ['class' => 'form-control'] )}}</td>
                                    <td>{{Form::text('place', $task->place, ['class' => 'form-control'] )}}</td>
                                    <td>{{Form::text('responsibility', $task->responsibility, ['class' => 'form-control'] )}}</td>

                                    <td><button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Direct Update
                                            </button></td>
                                </form></th>
                                    
                                    <th><form action="{{ url('tasklist/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                    </th>
                                    <th><form action="{{ url('tasklist/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Edit Page
                                                </button>
                                            </form></th>
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