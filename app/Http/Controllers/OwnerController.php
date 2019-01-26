<?php

namespace App\Http\Controllers;
use AuthenticatesUsers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Category;
use App\Owner;
use App\Post;
use Image;
use Auth;

class OwnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    { 
        
       // for validation
       $this->validate($request, [
        'restaurant_name'=>'required',
        'address'=>'required',
        'categories'=>'required',
        'phone_number'=>'required',
        'seating_capacity'=>'required',
        'time'=>'required',
        'image'=>'',
        ]);
       //for data insert 
        
      
        $owner= new Owner;
       
        $owner->restaurant_name = $request->restaurant_name;
 
        
        $owner->address = $request->address;
         
        $owner->categories = $request->categories;
        $owner->phone_number= $request->phone_number;
        $owner->seating_capacity= $request->seating_capacity;
        $owner->time=$request->time;
        //save image
        // $files=$request->file('image');
      /*  if( $files=$request->file('image'))
        {
           foreach ($files as $file){
           // $image = $request->file('image');
           // $filename = $file->getClientOriginalName();
            //for rename image file name.
            $filename = time() . '.' . $file->getClientOriginalExtension();
            //for save in public location
            $location = public_path('images/' . $filename);
            //using intervention we can resize images
            //Image::make($image)->resize(400,400)->save($location); //for single img
            Image::make($file)->resize(400,400)->save($location);
            //for saving images in database
            $owner->image = $filename;
        }*/

        //this is for single image
         if($request->hasFile('image'))
        {
           
            $image = $request->file('image');
            //for rename image file name.
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //for save in public location
            $location = public_path('images/' . $filename);
            //using intervention we can resize images
            Image::make($image)->resize(400,400)->save($location);
            //for saving images in database
            $owner->image = $filename;
        }
      
               if (Auth::user()->restaurant_name != $owner->restaurant_name) {
                     abort(404);
                 } 

        
        $owner->save();

       
        return redirect()->route('list-show');

      

}

  public function index()
    {    
        
         $owner = Owner::paginate(50);
         return view('owner-list', compact('owner'));
    }
    public function show($id){
        $owner = Owner::whereId($id)->first();
         
        return view('profile', compact('owner'));
    }

public function edit($restaurant_name)
{
   $owner= Owner::find($restaurant_name);
   if (Auth::user()->restaurant_name != $owner->restaurant_name) {
            abort(404);
        }
        
   return view('edit', compact('owner'));

}
public function update(Request $request, $id)
{

     
        $this->validate($request, [
            //'subject' => "required|max:255|unique:posts,title,$id",
            
             'address'=>'required',
        'categories'=>'required',
        'phone_number'=>'required',
        'seating_capacity'=>'required',
        'time'=>'required',
        'image'=>'',
        ]);
        $owner = Owner::find($id);
       
    
        $owner->address = $request->address;
        $owner->categories = $request->categories;
        $owner->phone_number= $request->phone_number;
        $owner->seating_capacity= $request->seating_capacity;
        $owner->time=$request->time;
        /* if($request->hasFile('image'))
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
            $owner->image = $filename;
        }*/
        //}
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
            $owner->image = $filename;
        }
        $owner->save();
         return redirect('/create/owner-list');
}

public function destroy($id){
    $owner= Owner::find($id);
     if (Auth::user()->restaurant_name != $owner->restaurant_name) {
            abort(404);
        }
    $owner->forceDelete();
  Session::flash('success', 'Restaurant was succesfully deleted');
    return redirect('/create/owner-list');
}

public function search(Request $request){

    $query = $request->input('query');

    $owner= Owner::where('categories', 'like', "%$query%")->get();
    return view('search-result', compact('owner'));
}

}