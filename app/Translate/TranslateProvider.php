<?php

namespace App\Translate;

use Illuminate\Support\ServiceProvider;
use App\Translate\Translate;

class TranslateProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('translator', new Translate());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
