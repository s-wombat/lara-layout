<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CategoryTreeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->menuLoad();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function menuLoad()
    {
        View::composer('layouts.app', function ($view){
            $view->with('categories', \App\Category::with('children')->where('parent_id', 0)->get());
        });
    }
}
