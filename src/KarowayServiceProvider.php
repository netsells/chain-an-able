<?php

namespace Netsells\Karoway;

use Illuminate\Support\ServiceProvider;
use Netsells\Karoway\Support\Karoway;

class KarowayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $pageModel = config('karoway.models.page.model');
        view()->share('karoway', (new Karoway)->setPage($pageModel::whereSlug(request()->path())->first()));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
