<?php

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    /*--------------------Service Controller ----------------------*/
    Route::get('/service', [
        'uses' => 'ServiceController@index',
        'as' => 'service.index'
    ]);
    Route::get('service/create', [
        'uses' => 'ServiceController@create',
        'as' => 'service.create'
    ]);
    Route::post('service/store', [
        'uses' => 'ServiceController@store',
        'as' => 'service.store'
    ]);

    Route::get('/service/{id}/edit', [
        'uses' => 'ServiceController@edit',
        'as' => 'edit_service'
    ]);

    Route::post('/service/update', [
        'uses' => 'ServiceController@update',
        'as' => 'update_service'
    ]);


    Route::get('services', [
        'uses' => 'ServiceController@getAllServices',
        'as' => 'all_services'
    ]);
    Route::post('detail', [
        'uses' => 'ServiceController@serviceDetail',
        'as' => 'service_detail'
    ]);


    Route::resource('/worker', 'WorkerController');
    Route::resource('/consumer', 'ConsumerController');

    Route::get('subservice/create', [
        'uses' => 'SubserviceController@create',
        'as' => 'subservice.create'
    ]);

    Route::post('subservice/create', [
        'uses' => 'SubserviceController@store',
        'as' => 'subservice.store'
    ]);


    Route::get('subservices', [
        'uses' => 'SubserviceController@view_all_subservices',
        'as' => 'view_all_subservices'
    ]);

    Route::get('subservice/destroy/{id}', [
        'uses' => 'SubserviceController@destroy',
        'as' => 'subservice.destroy'
    ]);
});

Auth::routes(); // My Login Logout and others are routes are placed here therefore im not removing this