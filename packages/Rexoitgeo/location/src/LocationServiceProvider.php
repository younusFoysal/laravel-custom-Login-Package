<?php

namespace Rexoitgeo\Location;

use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */

    // protected $namespace = 'rexoitgeo\younusfoysal\LocationControlle';



    public function boot()
    {

        include __DIR__.'/routes.php';

    }

    public function register()
    {
        // register our controller
        $this->app->make('Rexoitgeo\Location\LocationController');

        $this->loadViewsFrom(__DIR__.'/views', 'location');

      //  $this->app->make('rexoitgeo\younusfoysal\Controllers\LocationController');
     //   $this-> loadViewsFrom(__DIR__.'/views', 'calc');
    }

}