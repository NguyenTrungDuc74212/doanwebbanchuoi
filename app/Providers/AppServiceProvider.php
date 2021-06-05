<?php

namespace App\Providers;
use App\Models\CategoryPost;
use App\Models\CategoryProduct;
use App\Models\Order;

use App\Models\Product;

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
         $countOrderNew=Order::where('status',1)->get()->count();
         $max_price = Product::max('price'); 
         $min_price = Product::min('price');
         View::share(compact('postCategoryHeader','productCategoryHeader','countOrderNew','max_price','min_price'));
    }
}
