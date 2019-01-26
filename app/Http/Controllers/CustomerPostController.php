<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerPost;
use Session;
use Image;
use Storage;

class CustomerPostController extends Controller
{
     public function create()
    {
        return view('customer-post');
    }
    
    
   
    public function post_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            //'subject' => 'required|max:255',
             'body' => 'required|max:255'
        ]);

         $customer_post = new CustomerPost;
         $customer_post->name=$request->name;
        // $customer_post->subject = $request->subject;
         $customer_post->body = $request->body;

        
        //$post->user_id = Auth::user()->id;
         if($request->hasFile('image'))
        {
            //foreach ($images as $image) {
              
            
            $image = $request->file('image');
            //for rename image file name.
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //for save in public location
            $location = public_path('images/' . $filename);
            //using intervention we can resize images
            Image::make($image)->resize(400,400)->save($location);
            //for saving images in database
            $customer_post->image = $filename;
        }
        // }   
      
        $customer_post->save();

        Session::flash('success', 'Post was successfully added');
        return redirect('/customer/post/post-list');
    }

    public function index_post()
    {
        //$posts = Post::all()->sortByDesc('id');
         $customer_posts = CustomerPost::all();
        return view('customer-post-list', compact('customer_posts'));
    }
 
   
    public function post_edit($id)
    {

         $customer_post= CustomerPost::find($id);
        
        
   return view('customer-post-edit', compact('customer_post'));

       
    }

    
    public function post_update(Request $request, $id)
    {
        $customer_post = CustomerPost::find($id);
       
        $this->validate($request, [
           
           
            'body' => 'required|max:255'
        ]);
       
        $customer_post->body = $request->body;
        if($request->hasFile('image'))
        {
            // foreach ($images as $image){
            $image = $request->file('image');
            //for rename image file name.
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //for save in public location
            $location = public_path('images/' . $filename);
            //using intervention we can resize images
            Image::make($image)->resize(200,200)->save($location);
            //for saving images in database
            $customer_post->image = $filename;
        }
          // }
        $customer_post->save();

        Session::flash('success', 'Post was successfully added');
        return redirect('/customer/post/post-list');
    }

    
    public function post_destroy($id)
    {
        $customer_post = CustomerPost::find($id);
        
        $customer_post->forceDelete();
        Session::flash('success', 'Post was succesfully deleted');
        return redirect('/customer/post/post-list');
    }
    
}
