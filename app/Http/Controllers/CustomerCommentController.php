<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerPost;
use App\CustomerComment;
use Session;


class CustomerCommentController extends Controller
{
    public function store_comment(Request $request, $customer_post_id )
    {
        $this->validate($request, [
            'name' =>'required',
            'comment' => 'required|min:1|max:2000'
        ]);
        
        $customer_post = CustomerPost::find($customer_post_id);

        $comment = new CustomerComment();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->customer_post()->associate($customer_post);
        $comment->save();

        Session::flash('success', 'Your comment was succesffuly added');
        return redirect()->route('cus-post-show', $customer_post->id);
    }

    public function index(){

        $comments = new CustomerComment;
        return view('customer-post-list', compact('comments'));
    }

    public function edit($id)
    {
        $comment = CustomerComment::find($id);

        
        return view('(customer)comment-edit', compact('comment'));
    
    }

    
    public function update(Request $request, $id)
    {
         $comment = CustomerComment::find($id);
        /*if (Auth::user()->id != $comment->user_id) {
            abort(404);
        }*/
       
         
        $this->validate($request, [
            'name' => 'required',
            'comment' => 'required|min:3|max:2000'
        ]);
        
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        //$comment->user_id = Auth::user()->id;
        
        $comment->save();

        Session::flash('success', 'Comment was successfully edited');
        return redirect()->route('cus-post-show', $comment->customer_post->id);
        //return redirect('/post-list');
   
    }

   
    public function destroy($id)
    {
         $comment = CustomerComment::find($id);
       /* if (Auth::user()->id != $comment->user_id) {
            abort(404);
        }
        if ($comment == null) {
            abort(404);
        }*/
        
        $comment->forceDelete();
        Session::flash('success', 'comment was succesfully deleted');
        return redirect()->back();
    }
}
