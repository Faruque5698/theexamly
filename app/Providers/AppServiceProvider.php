<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            //$this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\KitLoong\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Form::component('error', 'backend.pages.settings.permissions.error', ['name']);

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $name = Auth::user()->name;
                $wr = wordwrap($name, 10, ':');
                $strs = explode(':', $wr);

                $view->with('currentUser', $strs[0]);
            }
        });
    }
}
