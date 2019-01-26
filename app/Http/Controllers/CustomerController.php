<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;

class CustomerController extends Controller
{
    
    public function index()
    {
       
         $owner = Owner::paginate(50);
         return view('restaurant-list', compact('owner'));
    }

    public function show($id){
        $owner = Owner::whereId($id)->first();
         /* if (Auth::user()->address != $profile->address ) {
            abort(404);
        }*/
        return view('restaurant-profile', compact('owner'));
    }

    public function search(Request $request){

    $query = $request->input('query');

    $owner= Owner::where('categories', 'like', "%$query%")->get();
    return view('search-restaurant', compact('owner'));
}

}
