<?php

namespace Wame\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class CoreServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Footer::make();
    }
}
