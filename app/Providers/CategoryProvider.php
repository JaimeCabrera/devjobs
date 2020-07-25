<?php

namespace App\Providers;
use App\Category;
use View;
use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //vamos a pasar la consulta a todas la vistas
        View::composer('*', function($view)
        {
            // consultamos a la base de datos
            $categories = Category::all();
            // se lo pasamos a la vista
            $view->with('categories', $categories);
        });
    }
}
