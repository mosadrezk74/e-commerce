<?php

namespace App\Providers;

use Illuminate\Support\Facades;
use App\View\Composers\HeaderComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Facades\View::composer('site.layouts.header', HeaderComposer::class);
    }
}
