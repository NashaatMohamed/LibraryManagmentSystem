<?php

namespace App\Http\Controllers;
use  App\Models\Book;
use  App\Models\author;
 use App\Models\comment;
use Illuminate\Http\Request;

use App\Models\Book_Category;

use Auth;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           

            $catigories=Book_Category::select('type', 'id')->get();

            $bookdata=Book::query()->with('Book_Category');


         if (request()->has('filter')&& data_get(request(),'filter.rate')){

            $bookdata=Book::whereIn('rate',data_get(request(),'filter.rate'))->paginate(2);

         }elseif (request()->has('latest')){
            $bookdata=Book::orderby('created_at','desc')->paginate(2);

         }elseif (request()->has('filter')&& data_get(request(),'filter.categories')){

            $bookdata->whereIn('category_id',data_get(request(),'filter.categories'))->paginate(2);
         }
         else{
               $bookdata=Book::paginate(2);
         }


        //  $bookdata=Book::paginate(2);
           return view ('user.book',['data'=>$bookdata
                                  ,'catigory'=> $catigories]);
        //  return response()->json($bookdata);

           return view ('user.book',['data'=>$bookdata,'catigory'=> $catigories]);
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showbycat($id)
    {


      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *




     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
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
      $books = Book::findOrFail($id);
      $books->rate = $request->rate;
      $books->save();
      return redirect()->route('show.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showcat($id)
    {
            $category = Book_Category::where('id',$id)->first();
             $catbooks=Book::where('category_id', $category->id)->paginate(2);
             return view ('user.category',['catbookdata'=>$catbooks]);
    }
}
