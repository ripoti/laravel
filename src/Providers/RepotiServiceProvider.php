<?php

namespace Repoti\Providers;

use Illuminate\Support\ServiceProvider;
use Repoti\Repoti;

class RepotiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('repoti', function (){
            return new Repoti();
        });
    }

    /**
     * Bootstrap services.
     * @return void
     */
    public function boot(): void
    {

        $this->publishes([__DIR__ . '/../Config/repoti.php' => config_path('repoti.php'),], 'config');
    }
}
