<?php
namespace sturtuk\phputils;


use Illuminate\Support\ServiceProvider;
use sturtuk\phputils\Models\Address;
use sturtuk\phputils\Traits\ConsoleTools;

class UtilServiceProvider extends ServiceProvider
{

    use ConsoleTools;
    protected $app_path = __DIR__;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        $this->mergeConfigFrom(realpath(__DIR__.'/../../config/config.php'), 'sturt.addresses');

        $this->app->singleton('sturt.addresses.address', $addressModel = $this->app['config']['sturt.addresses.models.address']);
        $addressModel === Address::class || $this->app->alias('sturt.addresses.address', Address::class);

    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishesConfig('sturtuk/phputils');
        $this->publishesMigrations('sturtuk/phputils');
        ! $this->autoloadMigrations('sturtuk/phputils') || $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}
