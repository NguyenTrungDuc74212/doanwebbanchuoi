<?php

namespace App\Providers;
use App\Models\CategoryPost;
use App\Models\CategoryProduct;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\View;

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
         Paginator::useBootstrap();
         $postCategoryHeader=CategoryPost::all();
         $productCategoryHeader=CategoryProduct::all();
         View::share(compact('postCategoryHeader','productCategoryHeader'));
    }
}
