<?php


namespace sturtuk\phputils\Controllers;


use Illuminate\Http\Request;
use sturtuk\phputils\Traits\Addressable;

class AddressController
{
    use Addressable;

    public function createAddress(Request $request){
        $primaryAddresses = app('sturt.addresses.address')->isPrimary()->get();
        dd($request->all(),$primaryAddresses);
    }

    public static function deleted($callback)
    {
        // TODO: Implement deleted() method.
    }

    public function morphMany($related, $name, $type = null, $id = null, $localKey = null)
    {
        // TODO: Implement morphMany() method.
    }
}
