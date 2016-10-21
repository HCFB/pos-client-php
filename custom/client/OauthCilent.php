<?php

namespace Custom\Client;

use GuzzleHttp\Client;
use CommerceGuys\Guzzle\Oauth2\GrantType\RefreshToken;
use CommerceGuys\Guzzle\Oauth2\GrantType\ClientCredentials;
use CommerceGuys\Guzzle\Oauth2\Oauth2Subscriber;

class OauthClient {
    private $base_url = 'https://api-sandbox.homecredit.ru/oauth/token';
    private $oauth2Client;
    private $oauth2;
    private $config = [
        'client_id' => 'test_partner',
        'client_secret' => 'test_partner_secret',
        'scope' => 'administration'
    ];


    public function __construct() {
        $this->token = new ClientCredentials($this->oauth2Client, $this->config);
        $this->refreshToken = new RefreshToken($this->oauth2Client, $this->config);
        $this->oauth2 = new Oauth2Subscriber($this->token, $this->refreshToken);
    }
}











$client = new Client([
    'defaults' => [
        'auth' => 'oauth2',
        'subscribers' => [$oauth2],
    ],
]);

//$response = $client->get('https://example.com/api/user/me');
//
//print_r($response->json());

// Use $oauth2->getAccessToken(); and $oauth2->getRefreshToken() to get tokens
// that can be persisted for subsequent requests.