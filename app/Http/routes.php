<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('front');
});

Route::post('/applicationCreate', 'Api\PosOnlineController@applicationCreate');

Route::get('/order/{orderId}', 'Api\PosOnlineController@getOrder');

Route::get("/accept", function (Request $request) {
    return redirect('/front/accept.html?order=' . $request->get("order"));
});

Route::post('offerCreate', 'Api\CashOnDeliveryController@createOffer');

Route::get("/offer/{method}/{offerId}", function ($method, $offerId) {
    return redirect("/front/offerResult.html?result=" . $method . "&offerId=" . $offerId);
});

Route::get("/offer/{offerId}", 'Api\CashOnDeliveryController@getOffer');

Route::put("/offer/{offerId}", 'Api\CashOnDeliveryController@changeOffer');