<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Model\Admin\Type;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $type = type2Tree(Type::all());
        view()->share('type',$type);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
