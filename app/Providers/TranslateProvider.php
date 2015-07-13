<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Translate;

class TranslateProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('translate', function($app)
        {
            return new Translate($app);
        });

        $this->app->alias('Translate', 'App\Providers\TranslateProvider');
    }
}
