<?php

namespace Topcu\MailTest;

use Illuminate\Support\ServiceProvider;

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
                __DIR__.'/../views' => resource_path('views/vendor/mailtest'),
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