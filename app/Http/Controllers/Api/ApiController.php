<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\ActionsRequest;
//use App\Model\ApplicationResponse;
use App\Model\ClientInfo;
use App\Model\CreateActionRequest;
use App\Model\DeliveryAddress;
use App\Model\Order;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use \JsonMapper;

class ApiController extends Controller {

    protected $client;
    protected $mapper;

    /**
     * @Autowired :)
     * @param Client $client
     * @param JsonMapper $mapper
     */
    public function __construct(Client $client, JsonMapper $mapper) {
        $this->client = $client; /* Клиент настраивается в \App\Providers\Oauth2ClientServiceProvider */
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

        $jsonData = stripslashes(html_entity_decode($request->getContent()));
        $contactObject = $this->mapper->map(
            json_decode(trim($jsonData)),
            new CreateActionRequest()
        );
        $request = new ActionsRequest();
        $request->setShopUrl($_SERVER["HTTP_ORIGIN"]);
        $request->setOrder($this->generateOrder($contactObject));
        $request->setClientInfo($this->generateClientInfo($contactObject));
        $options = ["body" => json_encode($request)];

        $response = $this->client->post("/e-shop/v1/applications", $options);
//        $responseObject = $this->mapper->map(
//            json_decode($response->getBody()),
//            new ApplicationResponse()
//        );
        return (string) $response->getBody();
    }

    /**
     * @param CreateActionRequest $contactObject
     * @return Order
     */
    private function generateOrder(CreateActionRequest $contactObject) {
        $order = new Order();
        $order->setItems($contactObject->getItems());
        $address = new DeliveryAddress();
        $address->setAddress($contactObject->getAddress());
        $address->setCode($contactObject->getCode());
        $order->setDeliveryAddress($address);
        $order->setOrderNum(rand(1000000000, 9999999999)); /* for example */
        $order->setProductCode("0-0-12"); /* @todo Узнать что это */
        $order->setOrderDateComplete(date("Y-m-d"));
        $order->setOrderSum($this->getOrderSumm($contactObject->getItems()));
        return $order;
    }

    /**
     * @param \App\Model\Item[] $items
     * @return float
     */
    private function getOrderSumm(array $items) {
        $summ = 0;
        foreach ($items as $item) {
            $summ += $item->getPrice() * $item->getQuantity();
        }
        return $summ;
    }

    /**
     * @param CreateActionRequest $contactObject
     * @return ClientInfo
     */
    private function generateClientInfo(CreateActionRequest $contactObject) {
        $clientInfo = new ClientInfo();
        $clientInfo->setFirstName($contactObject->getName());
        $clientInfo->setMiddleName($contactObject->getMiddlename());
        $clientInfo->setLastName($contactObject->getLastname());
        $clientInfo->setEmail($contactObject->getEmail());
        $clientInfo->setPhone($contactObject->getPhone());
        $clientInfo->setSex($contactObject->getSex());
        return $clientInfo;
    }
}
