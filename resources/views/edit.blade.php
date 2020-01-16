@extends('layouts.app')

@section ('title')
View and Edit a Task
@endsection

@section ('content')
    <h1>Talk List</h1>

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
                                    <th>Update Button</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <form action="{{ url('edit/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                
                                        <div class="form-group">
                                        {{Form::text('taskname', $task->taskname, ['class' => 'form-control'] )}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                        {{Form::text('priority', $task->priority, ['class' => 'form-control'] )}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                        {{Form::text('place', $task->place, ['class' => 'form-control'] )}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {{Form::text('responsibility', $task->responsibility, ['class' => 'form-control'] )}}
                                        </div>
                                    </td>
                                    <td>

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Update
                                                </button>
                                            </form></th></td>
                                    <th></th>
                                </tr>       
                            </tbody>
                        </table>
                        </div>
                    
        </div>
    
          
    </div>    
</div>
@endsection

@section ('sidebar')
    
@endsection

