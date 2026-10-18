<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Contracts\Repositories\DoctorRepositoryInterface;
use \App\Repositories\EloquentDoctorRepository;
use  \App\Contracts\Repositories\SpecialtyRepositoryInterface;
use \App\Repositories\EloquentSpecialtyRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            DoctorRepositoryInterface::class,
            EloquentDoctorRepository::class
        );

        $this->app->bind(
            SpecialtyRepositoryInterface::class,
            EloquentSpecialtyRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
