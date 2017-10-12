<?php

namespace smartdata\Email;

use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
     require __DIR__ . '/Http/routes.php';


    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
  
        $this->app->make('smartdata\Email\EmailController');
        $this->loadViewsFrom(__DIR__.'/views', 'email');
        $this->loadViewsFrom(__DIR__.'/views', 'headers');
        $this->loadViewsFrom(__DIR__.'/views', 'footers');

         $this->loadViewsFrom(__DIR__.'/views', 'update');
        $this->loadViewsFrom(__DIR__.'/views','AddEmail');
        $this->publishes([__DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');
	$this->publishes([__DIR__.'/views/assets' => public_path('smartdata/assets'),
        ], 'public');
        

    }
}
