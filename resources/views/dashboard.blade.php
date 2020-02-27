@extends('layouts.app')

@section ('title')
Dashboard Page!
@endsection

@section ('content')
    <section class="row new-post">
        <div class="col-md-8 col-md-offset-3">
            <header>What do you have to say?....</header>
            <form class="form-signup" action="{{ url('/postdashboard') }}" method="POST">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" cols="15" rows="5" placeholder="what do you want to say?">{{ Request::old('body') }}</textarea>
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

            <article class="post" data-postid="{{ $post->id }}">
                <p>{{$post->body}}</p>
                <div class="info">Posted by <b>{{$post->user->fullname}}</b> on {{$post->created_at->format('F j, Y, g:i a')}}</div>
                <div class="interaction">
                <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
                @if (Auth::user() == $post->user)
                    |
                    <a href="#" class="edit-post">Edit</a>
                    | <a href="{{ url('post-delete/'.$post->id) }}">Delete</a>
                @endif
                </div>
            </article>
            

        @endforeach
        </div>
    
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="modal-post-body" id="modal-post-body" rows="5"></textarea>
                            <input type="hidden" name="_token" value="{{ Session::token() }}" >
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit-modal') }}';
        var urlLike = '{{ route('like') }}';
        
    </script>

@endsection

@section ('sidebar')
@endsection