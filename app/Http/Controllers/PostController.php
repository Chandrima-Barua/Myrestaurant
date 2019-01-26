<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Image;
use App\Comment;
use App\Post;
use Storage;

class PostController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('post');
    }
    
    
   
    public function post_store(Request $request)
    {
        $this->validate($request, [
            'restaurant_name' => 'required',
            'subject' => 'required|max:255',
             'body' => 'required|max:255',
             'image'=>'required'
        ]);

       
            $images = $request->file('image');
             //print_r($images);die;
            $img = '';
            foreach ($images as $image){
                //echo $image->getClientOriginalName() . "</br>";
                $file =$image->getClientOriginalName();
                $img = $img . $file . ';' ;
               // print_r($file);  //take all pics
                
               $location = public_path('images/' . $file); //save pc location all pics
                
                Image::make($image)->resize(400,400)->save($location);
               // print_r($location);//print location
              }
               $post = new Post;
               $post->subject = $request->subject;
               $post->restaurant_name=$request->restaurant_name;
               $post->body = $request->body;
            
               $post->image = $img;


                 if (Auth::user()->restaurant_name != $post->restaurant_name) {
            abort(404);
            }
    
          $post->save();

        Session::flash('success', 'Post was successfully added');
        return redirect('/post-list');
    }

   
 
   
    public function post_edit(Post $post)
    {

        // $post= Post::find($id);
         if (Auth::user()->restaurant_name != $post->restaurant_name) {
            abort(404);
        }
        
   return view('post-edit', compact('post'));

       
    }

    
    public function post_update(Request $request, $id)
    {
        $post = Post::find($id);
       
        $this->validate($request, [
           
            'subject' => "required|max:255",
            'body' => 'required|max:255'
        ]);
        $post->subject = $request->subject;
        $post->body = $request->body;

        //($post->approve == 0);
        if($request->hasFile('image'))
        {
            // foreach ($images as $image){
            $image = $request->file('image');
            //for rename image file name.
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //for save in public location
            $location = public_path('images/' . $filename);
            //using intervention we can resize images
            Image::make($image)->resize(400,400)->save($location);
            //for saving images in database
            $post->image = $filename;
        }
          // }
        $post->save();

        Session::flash('success', 'Post was successfully added');
        return redirect('/post-list');
    }

    
    public function post_destroy($id)
    {
        $post = Post::find($id);
      
        $post->forceDelete();
        Session::flash('success', 'Post was succesfully deleted');
        return redirect('/post-list');
    }

    public function admin_post_destroy($id)
    {
        $post = Post::find($id);
        
        $post->forceDelete();
        Session::flash('success', 'Post was succesfully deleted');
         return redirect('/pending/posts');
    }

     public function pending()
     {

        $posts= Post::where('approve', 0)->get();
        return view('pending', compact('posts'));
    }

  

   public function approval( $id){

     $posts = Post::find($id);

        $posts->approve = 1;
       
   
        $posts->save();

        Session::flash('success', 'Post was succesfully approved!!');
        return redirect('/approved/post-list');
        // return view('post-list', compact('posts'));
          //return redirect()->back();

   }
    
     public function index_post()
    {
        //$posts = Post::all()->sortByDesc('id');
         $posts = Post::where('approve', 1)->get();
        return view('post-list', compact('posts'));
    }
}
