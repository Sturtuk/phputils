<?php

Route::group([
    'middleware' => ['guest']
], function () {

    Route::get('address/test', 'AddressController@createAddress');

});
