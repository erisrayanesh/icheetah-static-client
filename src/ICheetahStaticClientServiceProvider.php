<?php

namespace ErisRayanesh\ICheetahStaticClient;

use ErisRayanesh\ICheetahStaticClient\Manager;
use Illuminate\Support\ServiceProvider;

class ICheetahStaticClientServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('media.php')
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

		$this->mergeConfigFrom(__DIR__.'/config/config.php', 'media');

        $app->singleton('media', function ($app) {
            return new Manager($app['config']->get('media.url'), $app['config']->get('media.key'));
        });

        $app->alias('media', 'ErisRayanesh\ICheetahStaticClient\Manager');
    }

}
