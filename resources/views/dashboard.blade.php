@extends('layouts.app')

@section ('title')
Welcome to Home page!
@endsection

@section ('content')
    <section class="row new-post">
        <div class="col-md-8 col-md-offset-3">
            <header>What do you have to say?....</header>
            <form class="form-signup" action="{{ url('/postdashboard') }}" method="POST">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" cols="15" rows="5" placeholder="what do you want to say?"></textarea>
                </div>
                <button type="submit" class="btn- btn-primary">Create Post</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}" >
            </form>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-8 col-md-offset-3">
            <header>What other people say...</header>
            @foreach($posts as $post)

            <article class="post">
                <p>{{$post->body}}</p>
                <div class="info">
                    Posted by <b>{{$post->user->fullname}}</b> on {{$post->created_at->format('F j, Y, g:i a')}}
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Disike</a>
                @if (Auth::user() == $post->user)
                    |
                    <a href="#">Edit</a> |
                    <a href="{{ url('post-delete/'.$post->id) }}">Delete</a>
                @endif
                </div>
            </article>

        @endforeach
        </div>
    
    </section>

@endsection

@section ('sidebar')
@endsection
