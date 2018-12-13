<?php

use Infinity_Service\Order;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('services', 'ServiceController@api_index');
Route::get('subservices/{title}', 'SubserviceController@api_index');
Route::post('consumer/register', 'ConsumerController@registerUser');
Route::post('consumer/saveProfile', 'ConsumerController@saveProfile');
Route::get('consumer/userProfileData/{email}', 'ConsumerController@userProfileData');
Route::get('/getServiceDetail/{subservice_name}', 'SubserviceController@subservice_detail');
Route::get('/getServiceDetail/{subservice_name}', 'SubserviceController@subservice_detail');
Route::get('push-notification', 'ServiceController@PushNotification');

Route::post('message_token', [
    'uses' => 'ConsumerController@message_token',
    'as' => 'message_token'
]);

Route::post('sendNotificationsToAll', [
    'uses' => 'ConsumerController@sendNotificationsToAll',
    'as' => 'message_token'
]);

Route::get('subservices_spinner', [
    'uses' => 'SubserviceController@getAllSubservices',
    'as' => 'server_key'
]);

Route::get('serverKey', [
    'uses' => 'ConsumerController@getServerKey',
    'as' => 'server_key'
]);

Route::get('orders', 'OrderController@all_orders');

Route::post('/place_order', 'OrderController@store');

Route::get('service_order', function () {
    return Order::all();
});

/*---------Worker Profilr--------*/

Route::post('worker/register', 'WorkerController@registerUser');
Route::post('worker/saveProfile', 'WorkerController@saveProfile');
Route::get('worker/userProfileData/{email}', 'WorkerController@userProfileData');

Route::post('worker/message_token', [
    'uses' => 'WorkerController@message_token',
    'as' => 'message_token'
]);

/*
 *  1) API Endpoint for application.
 *
 *  Serive => /services for all services.
 *
 */