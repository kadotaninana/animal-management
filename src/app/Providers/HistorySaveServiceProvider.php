<?php

namespace App\Providers;

use App\Domain\UseCase\HistorySave;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class HistorySaveServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HistorySave::class, function ($app) {
            return new HistorySave();
        });
    }

    public function provides()
    {
        return [
            HistorySave::class,
        ];
    }
}
