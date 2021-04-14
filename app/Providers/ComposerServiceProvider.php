<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        view()->composer("admin.layout.menu","App\Http\ViewComposers\MenuViewComposer");
        view()->composer("admin.dashboard.dashboard","App\Http\ViewComposers\MenuViewComposer");
    }
}
