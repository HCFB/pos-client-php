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

Route::post('/applicationCreate', 'Api\ApiController@applicationCreate');

Route::get('/order/{orderId}', 'Api\ApiController@getOrder');

Route::get("/accept", function (Request $request) {
    return redirect('/front/accept.html?order=' . $request->get("order"));
});

Route::post('offerCreate', 'Api\CashOnDeliveryController@createOffer');