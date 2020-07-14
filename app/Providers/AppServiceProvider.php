<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Http\ViewComposers\FrontendFooterComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment() == 'local'){
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.frontend.footer', FrontendFooterComposer::class);
    }
}
