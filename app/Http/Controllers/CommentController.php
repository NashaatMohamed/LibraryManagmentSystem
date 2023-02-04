<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\comment;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        // return view('comment.create',['data'=>comment::whereUserId(Auth::id())->get()]);
        // return  $comments ;



        // return view('comment.create',['data'=>comment::whereUserId(Auth::id())->get()]);
        // return  $comments ;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
   return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|min:3|max:1000'
        ]);

    $user = new comment();
        $user->comment = $request->post('comment');
        $user->user_id = Auth::id();
        $user->book_id = $request->post('book_id');
        $user->save();
        $comment=comment::all();
        session()->flash('success', 'comment added Successfully !');
        return redirect()->back();
   }
//
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $comment=comment::all();
        // return view("comment.create",['comments'=>$comment]);
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
        $comments =comment::find($id)->delete();

        return redirect()->back();
    }
}
