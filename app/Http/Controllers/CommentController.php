<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;
use Session;
use Storage;
class CommentController extends Controller
{
   
    public function store_comment(Request $request, $post_id )
    {
        $this->validate($request, [
            
            'comment' => 'required|min:3|max:2000'
        ]);
        
        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        
        $comment->post()->associate($post);
        $comment->save();

        Session::flash('success', 'Your comment was succesffuly added');
        return redirect()->route('show', $post->id);
    }

    public function index(){

        $comments = new Comment;
        return view('post-list', compact('comments'));
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        if (Auth::user()->id != $comment->user_id) {
            abort(404);
        }
        if ($comment == null) {
            abort(404);
        }
       
        return view('comment-edit', compact('comment'));
    
    }

    
    public function update(Request $request, $id)
    {
         $comment = Comment::find($id);
        if (Auth::user()->id != $comment->user_id) {
            abort(404);
        }
       
         
        $this->validate($request, [
            
            'comment' => 'required|min:3|max:2000'
        ]);
        
       
        $comment->comment = $request->comment;
        //$comment->user_id = Auth::user()->id;
        
        $comment->save();

        Session::flash('success', 'Comment was successfully edited');
        return redirect()->route('show', $comment->post->id);
        //return redirect('/post-list');
   
    }

   
    public function destroy($id)
    {
         $comment = Comment::find($id);
        if (Auth::user()->id != $comment->user_id) {
            abort(404);
        }
        if ($comment == null) {
            abort(404);
        }
        
        $comment->forceDelete();
        Session::flash('success', 'comment was succesfully deleted');
        return redirect()->back();
    }
}
