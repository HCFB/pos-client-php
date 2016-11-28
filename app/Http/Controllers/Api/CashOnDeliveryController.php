<?php
/**
 * Created by PhpStorm.
 * User: rrybasov
 * Date: 22.11.2016
 * Time: 14:24
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Model\CashOnDelivery\ChangeOfferRequest;
use App\Http\Model\CashOnDelivery\ChangeOfferResponse;
use App\Http\Model\CashOnDelivery\DeliveryAddress;
use App\Http\Model\CashOnDelivery\Dto\ItemDTO;
use App\Http\Model\CashOnDelivery\Dto\OfferCreateDTO;
use App\Http\Model\CashOnDelivery\ErrorResponse;
use App\Http\Model\CashOnDelivery\OfferRequest;
use App\Http\Model\CashOnDelivery\OfferResponse;
use App\Http\Model\CashOnDelivery\Price;
use App\Models\CodCartItem;
use App\Models\CodDeliveryAddress;
use App\Models\CodOffer;
use App\Models\CodUserInfo;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use JsonMapper;


class CashOnDeliveryController extends Controller {

    /**
     * @var JsonMapper
     */
    private $mapper;
    private $client;

    /**
     * @Autowired :)
     * @param JsonMapper $mapper
     * @param Client $client
     */
    public function __construct(JsonMapper $mapper, Client $client) {
        $this->mapper = $mapper;
        $this->client = $client;
        
    }

    public function createOffer(Request $request) {
        $jsonArray = json_decode(trim(stripslashes(html_entity_decode($request->getContent()))));
        /**
         * @var OfferCreateDTO
         */
        $offerDto = $this->mapper->map($jsonArray, new OfferCreateDTO());

        $offer = $this->generateOffer($offerDto);
        $offerRequest = $this->mapper->map($jsonArray, new OfferRequest());
        $deliveryAddress = $this->mapper->map($jsonArray, new DeliveryAddress());
        $offerRequest->setTotalPrice(Price::withAllArgs($this->getTotalPrice($offerDto->items), "RUR"));
        $offerRequest->setDeliveryAddress($deliveryAddress);
        $offerRequest->setShopOrderId($offer->getAttribute("id"));
        $offerRequest->setSuccessUrl($_SERVER["HTTP_ORIGIN"] ."/offer/success/". $offer->getAttribute("id"));
        $offerRequest->setFailUrl($_SERVER["HTTP_ORIGIN"] . "/offer/fail/". $offer->getAttribute("id"));
        $offerRequest->setDiscountAmount(Price::withAllArgs(0, "RUR"));
        $offerRequest->setShippingCost(Price::withAllArgs(0, "RUR"));

        $options = ["body" => json_encode($offerRequest)];
        try {
            $response = $this->client->post("/CashOnDelivery/v1/offers", $options);
        } catch (RequestException $ex) {
            Log::warning($ex->getResponse()->getBody());
            throw $ex;
        }
        $responseJson = json_decode($response->getBody());
        /**
         * @var \App\Http\Model\CashOnDelivery\OfferResponse
         */
        $offerResponse = $this->mapper->map($responseJson, new OfferResponse());
        $this->processOfferResponse($offerResponse, $offer);

        $link = "";
        foreach ($offerResponse->getLinks() as $linkItem) {
            if($linkItem->rel == "REDIRECT_URL")
                $link = $linkItem;
        }

        return response(json_encode($link))
            ->header("Content-Type", "application/json");
    }

    public function getOffer($offerId) {
        $offer = CodOffer::find($offerId);
        $offer->codDeliveryAddress;
        $offer->codUserInfo;
        $offer->codCartItems;
        return response(json_encode($offer))
            ->header("Content-Type", "application/json");

    }
    
    public function changeOffer($offerId, Request $request) {
        /**
         * @var CodOffer
         */
        $offer = CodOffer::find($offerId);
        $jsonArray = json_decode(trim(stripslashes(html_entity_decode($request->getContent()))));

        $offerRes = $this->client->get("/CashOnDelivery/v1/offers/" . $offer->getAttribute("remoteId"));
        $offerRes = $this->mapper->map(json_decode($offerRes->getBody()), new OfferResponse());
        if($offerRes->getStatus() == "signed") {
            try {
                $changeOfferRequest = $this->mapper->map($jsonArray, new ChangeOfferRequest());
                $statusChange = $this->client->put("/CashOnDelivery/v1/offers/" . $offer->getAttribute("remoteId"),
                    ["body" => json_encode($changeOfferRequest)]);
                $changeResponse = $this->mapper->map(json_decode($statusChange->getBody()), new ChangeOfferResponse());
                $offer->setAttribute("status", $changeOfferRequest->getStatus());
                $offer->save();
            } catch (RequestException $ex) {
                Log::warning($ex->getResponse()->getBody());
                throw $ex;
            }
            return response(json_encode($changeResponse))
                ->header("Content-Type", "application/json");
        } else {
            $offer->setAttribute("status", $offerRes->getStatus());
            $offer->save();
            return response(json_encode(new ErrorResponse("Нет подтвержденного клиентом заказа с таким id: " . $offer->getAttribute("remoteId"))), 403)
                ->header("Content-Type", "application/json");
        }
    }


    /**
     * @param $offerResponse OfferResponse
     * @param $offer CodOffer
     */
    private function processOfferResponse($offerResponse, $offer) {
        $offer->setAttribute("currency", $offerResponse->getCurrency());
        $offer->setAttribute("goodsPrice", $offerResponse->getGoodsPrice());
        $offer->setAttribute("servicePrice", $offerResponse->getServicePrice());
        $offer->setAttribute("totalPrice", $offerResponse->getTotalPrice());
        $offer->setAttribute("status", $offerResponse->getStatus());
        $offer->setAttribute("validTo", $offerResponse->getValidTo());
        $offer->setAttribute("remoteId", $offerResponse->getId());        
        $offer->update();
    }


    /**
     * @param OfferCreateDTO $offerCreateDTO
     * @return mixed
     */
    private function generateOffer(OfferCreateDTO $offerCreateDTO) {

        $offer = new CodOffer((array) $offerCreateDTO);
        $offer->save();
        $deliveryAddress = new CodDeliveryAddress((array) $offerCreateDTO);
        $offer->codDeliveryAddress()->save($deliveryAddress);
        $userInfo = new CodUserInfo((array) $offerCreateDTO);
        $offer->codUserInfo()->save($userInfo);
        $items = array();
        foreach ($offerCreateDTO->items as $item) {
            $newItem = new CodCartItem((array) $item);
            $newItem->setAttribute("amount", $item->getItemPrice()->getAmount());
            $newItem->setAttribute("currency", $item->getItemPrice()->getCurrency());
            $newItem->offer()->associate($offer);
            $items[] = $newItem;
        }
        $offer->codCartItems()->saveMany($items);
        return $offer;
    }

    /**
     * @param $items ItemDTO[]
     * @return double
     */
    private function getTotalPrice($items)
    {
        /**
         * @var double
         */
        $result = 0;
        foreach($items as $item) {
            $result += $item->getQuantity() * $item->getItemPrice()->getAmount();
        }
        return $result;
    }

}