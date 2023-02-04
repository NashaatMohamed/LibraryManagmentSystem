<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Model\Book;
use Illuminate\Support\Facades\DB;
use Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $favorites = DB::table('favorites')->where('user_id', '=', Auth::id())->get();    
        return view('favorite.create',compact('favorites'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // dd($request);
        // dd(Auth::id());

        //-------validation

        //-------store
        $favorite =new Favorite();
        $favorite->user_id=Auth::id();
        $favorite->book_id=$request->id;
        $favorite->discription=$request->description;
        $favorite->price=$request->price;
        $favorite->title=$request->title;
        $favorite->rate=$request->rate;
        $favorite->image=$request->image;
        $favorite->save();

        //-------redirect

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Favorite::find($id)->delete();
        return redirect()->back();
    }
}
