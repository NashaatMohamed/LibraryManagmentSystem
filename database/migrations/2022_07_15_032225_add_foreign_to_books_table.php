<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('books', function (Blueprint $table) {
        //     $table -> foreignId('category_id') -> constrained('book_categories');
        //     $table -> foreignId('author_id') -> constrained('authors');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('books', function (Blueprint $table) {
        //     //
        // });
    }
}
