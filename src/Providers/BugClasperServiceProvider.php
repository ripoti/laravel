<?php

namespace Kinatech\BugClasper\Providers;

use Illuminate\Support\ServiceProvider;
use Kinatech\BugClasper\BugClasper;

class BugClasperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('bugClasper', function (){
            return new BugClasper();
        });
    }

    /**
     * Bootstrap services.
     * @return void
     */
    public function boot(): void
    {

        $this->publishes([__DIR__ . '/../Config/bugClasper.php' => config_path('bugClasper.php'),], 'config');
    }
}
