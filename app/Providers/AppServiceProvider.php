<?php

namespace App\Providers;

use App\Models\CourseCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
//        View::share('alAmin', CourseCategory::first());
        View::composer('front.master', function ($view){
            $view->with('categories', CourseCategory::where('status', 1)->get());
        });
    }
}
