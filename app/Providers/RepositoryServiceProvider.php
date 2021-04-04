<?php

namespace App\Providers;

use App\Repositories\DocumentType\DocumentTypeEloquentRepository;
use App\Repositories\DocumentType\DocumentTypeRepositoryInterface;
use App\Repositories\User\UserEloquentRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, UserEloquentRepository::class);
        $this->app->bind(DocumentTypeRepositoryInterface::class, DocumentTypeEloquentRepository::class);
    }
}
