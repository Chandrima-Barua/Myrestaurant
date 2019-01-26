<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Owner;
class CategoryController extends Controller
{
    

    public function create()
    {
        return view('category-create');
    }

   
    public function store(Request $request )
    {
         $this->validate($request, [
        
        'categories'=>'required'
        
        ]);
       //for data insert 
        // $owner = Owner::find($cat_id);
        $category= new Category;
     
        $category->categories = $request->categories;
       // $category->owners()->associate($owner);
        $category->save();

        return redirect()->route('cat-show');;

      

    }

    public function index()
    {
        $categories=Category::all();
        return view('category-list', compact('categories'));
    }
    
   
    public function edit($id)
    {
       
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
