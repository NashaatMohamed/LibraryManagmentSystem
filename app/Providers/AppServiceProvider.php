<?php

namespace App\Providers;
use App\Models\Book;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
// to make pagination
use Illuminate\Pagination\Paginator;
use App\Models\Book_Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
       Paginator::useBootstrap();

       view()->composer('user.layout',function($view){

        $view->with('user',Book_Category::get());
    });
    view()->composer('user.show',function($view){
        $view->with('book',Book::get());
    });

         
}
}











