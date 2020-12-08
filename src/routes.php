<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['guest']
], function () {

    Route::get('address/test', '\sturtuk\phputils\Controllers\AddressController@createAddress');

});
