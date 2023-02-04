<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\book;
use Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // $users = Auth::user();
        $users = user::where('id',Auth::id())->get();
        // $users = user::all();
        // return $users;
        return view('user.index',compact('users'));
    }
    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit',compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();
        session()->flash('success', 'profile user updated Successfully !');
        return redirect()->route('getprofile');
    }
    public function test(){
    //     $books = book::with(['categories'=>function($q){
    //         return $q->select('name','slug');
    //    }])->find(1);
    //    $books = book::categories()->where('id','categories.id');
    //    return $books;
     $book = book::all();
  $books  =  book::whereHas('categories', function($query) use($book) 
    { 
        $query->where('name', $book->categorie); 
    })->whereNotIn('name', [$book->name])->get();

    return $books;

    }
}
