<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share 'categories' only with the specific view 'frontend.layouts.header'
        View::composer('frontend.layouts.header', function ($view) {
            $categories = Category::with('sub_category')->get();
            $view->with('categories', $categories);
        });
    }
}
