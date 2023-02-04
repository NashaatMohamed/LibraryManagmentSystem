<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class searchController extends Controller
{
    public function search(){

        $books = Book::OrderBy('created_at', 'desc')->paginate(2);
        return view ('bookSearch', compact('books'));
    }

    public function getSearch(Request $request){
       $request->validate([
        'q' => 'required'
       ]);

       $q = $request -> q;
       $filteredBooks = Book::where('title', 'like', '%' . $q . '%')->paginate(2);

       if ($filteredBooks -> count()){
        return view ('bookSearch')->with([
            'books' => $filteredBooks
        ]);
       } else {
             return "No books with this title";

        }
    }
}
