<?php
namespace sturtuk\phputils;


use Illuminate\Support\ServiceProvider;
use sturtuk\phputils\Models\Address;

class UtilServiceProvider extends ServiceProvider
{

    protected $app_path = __DIR__;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {


        $this->app->singleton('sturt.addresses.address', $addressModel = $this->app['config']['sturt.models.address']);
        $addressModel === Address::class || $this->app->alias('sturt.models.address', Address::class);

        $this->publishes([$this->app_path.'/database' => base_path('database')],'sturt_migration');
        $this->publishes([$this->app_path.'/config' => base_path('config')],'sturt_migration');
        $this->mergeConfigFrom(
            $this->app_path.'/config/sturt.php', 'sturt'
        );

        $this->loadRoutesFrom($this->app_path . '/routes.php');

    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(
            $this->app_path.'/config/sturt.php', 'sturt'
        );

    }
}
