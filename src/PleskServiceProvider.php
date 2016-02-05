<?php

namespace Gregoriohc\LaravelPlesk;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class PleskServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        $this->handleConfigs();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        $this->app['plesk'] = $this->app->share(function($app) {
            return new Wrapper($app['config']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/plesk.php';

        $this->publishes([$configPath => config_path('plesk.php')]);

        $this->mergeConfigFrom($configPath, 'plesk');
    }
}
