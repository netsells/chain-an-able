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
        $this->publishes([
            __DIR__.'/karoway.php' => config_path('karoway.php'),
        ]);

        $pageModel = config('karoway.models.page.model');

        if ($pageModel) {
            // Not sure about this?
            view()->share('karoway', (new Karoway)->setPage($pageModel::whereSlug(request()->path())->first()));
        }
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
