<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

        protected $table = 'categories';

        // protected $hidden = ['pivot'];

//     public function books(){
//         return $this->belongsToMany(book::class, 'book_categories', 'categorie_id', 'book_id');
// }

public function books(){
    return $this->hasmany(Book::class, 'category_id');
}


}
