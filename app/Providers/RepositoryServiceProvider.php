<?php

namespace App\Providers;

use App\Interfaces\BaseInterface;
use App\Repositories\BaseRepository;
use App\Interfaces\CovidStatInterface;
use App\Interfaces\HelpGuideInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CovidStatRepository;
use App\Repositories\HelpGuideRepository;

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
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(CovidStatInterface::class, CovidStatRepository::class);
        $this->app->bind(HelpGuideInterface::class, HelpGuideRepository::class);
    }
}
