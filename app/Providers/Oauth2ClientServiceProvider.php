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

class Oauth2ClientServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GuzzleHttp\Client', function($app) {
            $baseUrl = config("custom")["apiBaseUrl"];
            $oauth2Client = new Client(['base_url' => $baseUrl]);

            $config = [
                'token_url' => 'oauth/token',
                'client_id' => 'test_partner',
                'client_secret' => 'test_partner_secret',
            ];

            $token = new ClientCredentials($oauth2Client, $config);

            $refreshToken = new RefreshToken($oauth2Client, $config);

            $oauth2 = new Oauth2Subscriber($token, $refreshToken);

            $client = new Client([
                'base_url' => $baseUrl,
                'defaults' => [
                    'auth' => 'oauth2',
                    'subscribers' => [$oauth2],
                    'headers' => [
                        "Accept" => "application/json, application/javascript, text/javascript",
                        "Content-Type" => "application/json; charset=UTF-8",
                        "User-Agent" => "Test Partner Backend"
                    ]
                ],
            ]);
            return $client;
        });

        // TODO: Implement register() method.
    }
}