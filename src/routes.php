<?php

Route::group([
    'middleware' => ['guest']
], function () {

    Route::post('AddressController/getList', 'AddressController@createAddress');

});
