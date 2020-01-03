<?php

namespace Lizhineng\Reviewable;

use Illuminate\Support\ServiceProvider;

class ReviewableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/reviewable.php' => config_path('reviewable.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/reviewable.php', 'reviewable'
        );
    }
}
