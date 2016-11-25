<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Model\ActionsRequest;
use App\Http\Model\ApplicationResponse;
use App\Http\Model\ClientInfo;
use App\Http\Model\CreateActionRequest;
use App\Http\Model\DeliveryAddress;
use App\Http\Model\Order;
use App\Utils\CustomMapper;
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
        $order = $this->generateOrder($contactObject);
        $orderModel = $this->getOrderModel($order);
        $request->setOrder($order);

        $request->setShopUrl($_SERVER["HTTP_ORIGIN"]. "/accept?order=".$orderModel->getAttribute("id")."&");
        $request->setClientInfo($this->generateClientInfo($contactObject));
        $options = ["body" => json_encode($request)];

        $response = $this->client->post("/e-shop/v1/applications", $options);
        /** @var ApplicationResponse $responseObject */
        $responseObject = $this->mapper->map(
            json_decode($response->getBody()),
            new ApplicationResponse()
        );

        CustomMapper::saveToModel($responseObject, $orderModel);
        return response((string) $response->getBody())->header("Content-Type", "application/json");
    }

    public function getOrder($orderId) {
        $order = \App\Models\Order::find($orderId);
        $order->deliveryAddress;
        $order->items;
        return response(json_encode($order))
                    ->header("Content-Type", "application/json");
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
        $order->setOrderNum(rand(10000000, 99999999)); /* for example */
        $order->setProductCode("0-0-12");
        $order->setOrderDateComplete(date("Y-m-d"));
        $order->setOrderSum($this->getOrderSumm($contactObject->getItems()));
        return $order;
    }

    private function getOrderModel(Order $order)
    {
        $orderModel = new \App\Models\Order();
        $orderModel->setAttribute('orderDateComplete', date("Y-m-d H:i:s" ,$order->getOrderDateComplete() / 1000));
        $orderModel->setAttribute('orderNum',$order->getOrderNum());
        $orderModel->setAttribute('orderSum',$order->getOrderSum());
        $orderModel->setAttribute('productCode',$order->getProductCode());
        $deliveryAddress = new \App\Models\DeliveryAddress((array) $order->getDeliveryAddress());
        $deliveryAddress->save();
        $orderModel->deliveryAddress()->associate($deliveryAddress);
        $orderModel->save();
        return $orderModel;
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

    /**
     * @param \App\Http\Model\Item[] $items
     * @return float
     */
    private function getOrderSumm(array $items) {
        $summ = 0;
        foreach ($items as $item) {
            $summ += $item->getPrice() * $item->getQuantity();
        }
        return $summ;
    }
}
