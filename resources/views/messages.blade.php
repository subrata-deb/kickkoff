@extends('layouts.app')
@section ('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8">
                <h2>"All Messages"</h2>
                @if(count($messages) > 0)
                    @foreach($messages as $message)
                        <ul class="list-group">
                            <li class="list-group-item">Name: {{$message->name}}</li>
                            <li class="list-group-item">Email: {{$message->email}}</li>
                            <li class="list-group-item">Messages: {{$message->message}}</li>
                        </ul>
                    @endforeach
                @endif
        </div>
    
          
    </div>    
</div>

@endsection

@section ('sidebar')
    @parent
@endsection
