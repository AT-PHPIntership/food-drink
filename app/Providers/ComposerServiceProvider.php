<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
    */
    public function boot()
    {
        View::composer(
            ['admin.product.create', 'admin.product.edit'],
            'App\Http\ViewComposers\CategoryComposer'
        );
        View::composer(
            ['admin.category.index'],
            'App\Http\ViewComposers\NameCategoryComposer'
        );
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
}
