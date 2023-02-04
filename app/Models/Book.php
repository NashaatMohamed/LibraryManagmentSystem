<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function author(){

        return $this-> belongsTo(author::class);
        
        
            }

    public function comment(){

        return $this->hasMany(comment::class);
        
        
            }
   
            // public function categories(){
            //         return $this->belongsToMany(categorie::class, 'book_categories', 'book_id', 'categorie_id');
            // }

            public function categories(){
                return $this->BelongsTo(categorie::class, 'category_id');
            }
}
