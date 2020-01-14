@extends('layouts.app')
@section ('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8">
                <h2>"All Messages"</h2>
                
                        
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Messages</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($messages) > 0)
                                    @foreach($messages as $message)
                                <tr>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->message}}</td>
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
    @parent
@endsection


