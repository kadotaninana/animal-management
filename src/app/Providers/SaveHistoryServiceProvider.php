<?php

namespace App\Providers;

use App\Service\BodyWeightHistorySaveService;
use App\Service\HistorySaveService;
use App\Service\SaveHistoryService;
use Illuminate\Support\ServiceProvider;

class SaveHistoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HistorySaveService::class, function ($app) {
            return new HistorySaveService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
