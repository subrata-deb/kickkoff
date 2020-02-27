<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Like; 

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

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
    
}