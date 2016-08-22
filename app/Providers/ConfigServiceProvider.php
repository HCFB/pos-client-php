<?php
/**
 * Created by PhpStorm.
 * User: jbyh
 * Date: 29.07.16
 * Time: 13:50
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        config([
            'config/custom.php',
        ]);
        // TODO: Implement register() method.
    }
}