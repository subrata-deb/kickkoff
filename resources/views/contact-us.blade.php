@extends('layouts.app')

@section ('title')
Contact Us Page!
@endsection

@section ('content')
    <h1>CONTACT US PAGE</h1>

    {!! Form::open(['url' => 'contact-us/submit']) !!}
    <a href="\messages" class="btn btn-info" role="button">All Messages</a>
    <p>Please let us know your opinion about this website.</p>
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Name:'] )}}
        </div>

        <div class="form-group">
            {{Form::label('email', 'E-Mail Address')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Email Address'] )}}
        </div>

        <div class="form-group">
            {{Form::label('message', 'Message')}}
            {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Message:'] )}}
        </div>

        {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection