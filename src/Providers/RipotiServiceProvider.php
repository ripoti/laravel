<?php

namespace Ripoti\Providers;

use Illuminate\Support\ServiceProvider;
use Ripoti\Ripoti;

class RipotiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('ripoti', function (){
            return new Ripoti();
        });
    }

    /**
     * Bootstrap services.
     * @return void
     */
    public function boot(): void
    {

        $this->publishes([__DIR__ . '/../Config/ripoti.php' => config_path('ripoti.php'),], 'config');
    }
}
