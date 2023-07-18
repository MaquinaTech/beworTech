<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $bindingInterfaces = [
        \Vocces\Company\Domain\CompanyRepositoryInterface::class =>
            \Vocces\Company\Infrastructure\CompanyRepositoryEloquent::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->bindingInterfaces as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
