<?php
/**
 * Created by PhpStorm.
 * User: rrybasov
 * Date: 22.11.2016
 * Time: 14:24
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CodCartItem;
use FiveLab\Component\ModelTransformer\Transformer\Annotated\AnnotatedModelTransformer;
use Illuminate\Http\Request;
use App\Models\CodOffer;
use JsonMapper;
use App\Http\Model\CashOnDelivery\Dto\OfferCreateDTO;



class CashOnDeliveryController extends Controller {

    /**
     * @var JsonMapper
     */
    private $mapper;

    /**
     * @Autowired :)
     * @param JsonMapper $mapper
     */
    public function __construct(JsonMapper $mapper) {
        $this->mapper = $mapper;
    }

    public function createOffer(Request $request) {
        $jsonData = stripslashes(html_entity_decode($request->getContent()));
        $offerDto = $this->mapper->map(
            json_decode(trim($jsonData)),
            new OfferCreateDTO()
        );
        /**
         * @var AnnotatedModelTransformer
         */

        $items = $this->generateOffer($offerDto);
        //print_r($items);

        /** @var CodOffer*/
        /*$offer = new CodOffer();
        //$offer->setAttribute("crateDate", date());
        $offer->setAttribute("remoteId", "asdasdasd");
        $offer->save();*/
    }


    /**
     * @param OfferCreateDTO $offerCreateDTO
     * @return mixed
     */
    private function generateOffer($offerCreateDTO) {
        /**
         * @var CodCartItem[]
         */
        $items = array();
        foreach ($offerCreateDTO->items as $item) {
            $oldItem = array();
            $oldItem = (array) $item;
            $newItem = new CodCartItem($oldItem);
            $newItem->save();
            //print_r($newItem->name);
            $items[] = $newItem;
        }
        return $items;
    }

}