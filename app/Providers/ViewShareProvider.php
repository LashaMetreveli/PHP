<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Models\Category;
use App\Models\Config;
use \Illuminate\Support\Facades\View;

class ViewShareProvider extends ServiceProvider
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
        $configs = Config::all()->pluck('value', 'key')->toArray();

        view()->share('_CONFIGS', $configs);
        // $c = [];
        // foreach ($configs as $c) {
        //     $c[$c->key] = $c->value;
        // }
        // dd($c);
    }
}
