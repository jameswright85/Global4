<?php

namespace App\Providers;

use App\Repository\Customer\Contracts\ManagesCustomer;
use App\Repository\Customer\CustomerManager;
use App\Repository\Orders\Contracts\ManagesOrders;
use App\Repository\Orders\OrderManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        $this->app->bind(ManagesCustomer::class, CustomerManager::class);
        $this->app->bind(ManagesOrders::class, OrderManager::class);
    }
}
