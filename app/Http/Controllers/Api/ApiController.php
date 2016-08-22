<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client as Clients;
use OAuth2\Client;


class ApiController extends Controller {

    protected $client;

    public function __construct(Clients $client) {
        $this->client = $client;
    }

    public function show()
    {
        $oauth = new Client("test_partner", "test_partner_secret", Client::AUTH_TYPE_AUTHORIZATION_BASIC, "/var/www/pos-client/storage/app/public/sandbox.homecredit.crt");
        $token = $oauth->getAccessToken("https://api-sandbox.homecredit.ru/oauth/token",
            Client::GRANT_TYPE_CLIENT_CREDENTIALS,
            array("grant_type" => "client_credentials"),
            array("Content-type" => "application/x-www-form-urlencoded; charset=UTF-8",
                "User-Agent" => "Test Partner Backend",
                "Accept" => "application/json"));
        $this->client->getBaseUrl();
        return print_r($token, 1);

    }

    public function getOffer() {

    }
    
}