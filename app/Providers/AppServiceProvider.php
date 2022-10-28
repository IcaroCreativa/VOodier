<?php

namespace App\Providers;
 // Inclure la facade "Schema"
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
  

// dans la méthode boot(), inclure la ligne suivante
public function boot()
{
    Schema::defaultStringLength(191);
}
}
