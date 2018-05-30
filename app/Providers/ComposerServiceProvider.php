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
            ['admin.product.create', 'admin.product.edit', 'admin.category.edit'],
            'App\Http\ViewComposers\CategoryComposer'
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
