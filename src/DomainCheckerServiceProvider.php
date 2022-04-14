<?php

namespace Soumairi\DomainChecker;

use Illuminate\Support\ServiceProvider;

class DomainCheckerServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__ . '/config/domain-checker.php', 'domain-checker');
        $this->publishes([
            __DIR__.'/config/domain-checker.php' => config_path('domain-checker.php')
        ]);
    }
}
