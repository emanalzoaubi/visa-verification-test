<?php

namespace App\Providers;


use App\Repositories\CountryRepository;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\UserCompanionRepositoryInterface;
use App\Repositories\Interfaces\UserOtpRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\VisaDocumentRepositoryInterface;
use App\Repositories\UserCompanionRepository;
use App\Repositories\UserOtpRepository;
use App\Repositories\UserRepository;
use App\Repositories\VisaDocumentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(UserOtpRepositoryInterface::class, UserOtpRepository::class);
        $this->app->bind(UserCompanionRepositoryInterface::class, UserCompanionRepository::class);
        $this->app->bind(VisaDocumentRepositoryInterface::class, VisaDocumentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Schema::defaultStringLength(191);
    }
}