<?php

declare(strict_types=1);

namespace Admin;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Support\Facades\Route;
use Admin\Contracts;
use Admin\Services;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'Admin\Controllers';

    /**
     * Service bindings
     * @var array
     */
    public $bindings = [
        Contracts\PostCategoryService::class => Services\PostCategoryService::class,
        Contracts\PostService::class => Services\PostService::class,
        Contracts\UploadService::class => Services\UploadService::class,
        Contracts\TopService::class => Services\TopService::class,
        Contracts\SettingService::class => Services\SettingService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutes();
        $this->loadViews();
    }

    /**
     * Load module routes
     */
    protected function loadRoutes()
    {
        Route::pattern('postCategory', '[0-9]+');

        if (! $this->app->routesAreCached()) {
            Route::name('admin.')
                ->prefix('admin/')
                ->middleware('admin')
                ->namespace($this->namespace)
                ->group(__DIR__ . '/routes.php');
        }
    }

    /**
     * Load module views
     */
    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'admin');
    }
}