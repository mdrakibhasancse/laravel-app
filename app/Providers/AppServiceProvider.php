<?php

namespace App\Providers;

use App\Enums\MainCategory;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
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
        View::composer('*', function ($view) {
            View::share('main_categories', MainCategory::asSelectArray());
            View::share('categories', Category::get());
        });
    }
}
