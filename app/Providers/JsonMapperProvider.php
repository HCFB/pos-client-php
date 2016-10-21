<?php
/**
 * Created by PhpStorm.
 * User: jbyh
 * Date: 29.07.16
 * Time: 13:05
 */

namespace App\Providers;


use CommerceGuys\Guzzle\Oauth2\GrantType\ClientCredentials;
use CommerceGuys\Guzzle\Oauth2\GrantType\RefreshToken;
use CommerceGuys\Guzzle\Oauth2\Oauth2Subscriber;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class JsonMapperProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('\JsonMapper', function($app) {
            return new \JsonMapper();
        });
    }
}