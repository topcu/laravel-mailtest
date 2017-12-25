<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Topcu\MailTest\MailTestCommand;

class MailTestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        if ($this->app->runningInConsole()) {

            $this->loadViewsFrom(__DIR__.'/../views', 'mailtest');
            $this->publishes([
                __DIR__.'/path/to/views' => resource_path('views/vendor/courier'),
            ]);

            $this->commands([
                MailTestCommand::class,
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}