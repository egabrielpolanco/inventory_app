<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Inventory\IInventoryContract;
use App\Repositories\InventoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IInventoryContract::class, InventoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
