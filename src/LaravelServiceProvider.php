<?php

namespace Intervention\Image;

use ErisRayanesh\ICheetahStaticClient\Manager;
use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('image.php')
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->singleton('media', function ($app) {
            return new Manager($app['config']->get('media'));
        });

        $app->alias('media', 'ErisRayanesh\ICheetahStaticClient\Manager');
    }

}
