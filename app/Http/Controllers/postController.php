<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class postController extends Controller
{
    public function postCreatePost(Request $request){
        $this->validate($request,[
            'body' => 'required|min:50'
        ]);

        $post = new Post;
        $post->body = $request['body'];
        $request->user()->posts()->save($post);

        return redirect('/dashboard')->with('your_post_success', 'Your post has been successfully submitted...');
    }

    public function getDashboard(){
        $posts = Post::orderby('created_at', 'desc')->get();
        return view('/dashboard')->with('posts', $posts);
    }

    public function deletePost($postid){

        $post = Post::findOrFail($postid);
        if (Auth::user() != $post->user){
            return redirect('/dashboard')->with('cannot_delete', 'You cannot delete this post...');
         }
        else
            $post->delete();
            return redirect('/dashboard')->with('post_deleted', 'Post deleted Successfully');
    }
}