<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\ActionsRequest;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use \JsonMapper;

class ApiController extends Controller {

    protected $client;
    protected $mapper;

    public function __construct(Client $client, JsonMapper $mapper) {
        $this->client = $client;
        $this->mapper = $mapper;
    }

    public function show()
    {
        $oauth = new Client("test_partner", "test_partner_secret", Client::AUTH_TYPE_AUTHORIZATION_BASIC);
        $token = $oauth->getAccessToken("https://api-sandbox.homecredit.ru/oauth/token",
            Client::GRANT_TYPE_CLIENT_CREDENTIALS,
            array("grant_type" => "client_credentials"),
            array("Content-type" => "application/x-www-form-urlencoded; charset=UTF-8",
                "User-Agent" => "Test Partner Backend",
                "Accept" => "application/json"));
        return print_r($token, 1);
    }

    public function applicationCreate(Request $request) {
        $options = ["body" => $request->getContent()];
        $jsonData = stripslashes(html_entity_decode($request->getContent()));
        $contactObject = $this->mapper->map(
            json_decode(trim($jsonData)),
            new ActionsRequest()
        );
        $response = $this->client->post("/e-shop/v1/applications", $options);
        return print_r($response->json(),1);
    }
}