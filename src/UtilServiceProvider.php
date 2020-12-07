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

        $this->publishes([$this->app_path.'/database' => base_path('database')],'sturt_migration');
        $this->mergeConfigFrom(
            $this->app_path.'/configs/sturt.php', 'sturt'
        );

    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(
            $this->app_path.'/configs/sturt.php', 'sturt'
        );

    }
}
