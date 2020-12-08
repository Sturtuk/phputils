<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['guest']
], function () {

    Route::get('address/create', '\sturtuk\phputils\Controllers\AddressController@createAddress');
    Route::get('address/find/{id}', '\sturtuk\phputils\Controllers\AddressController@find');
    Route::get('address/searchByRadius', '\sturtuk\phputils\Controllers\AddressController@findWithinRadius');

});
