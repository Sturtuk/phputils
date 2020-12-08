<?php
namespace sturtuk\phputils\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use sturtuk\phputils\Models\Address;
use sturtuk\phputils\Requests\AddressFindByRadiusValidator;
use sturtuk\phputils\Requests\AddressValidator;
use sturtuk\phputils\Traits\Addressable;

class AddressController extends BaseUtilController
{
    use Addressable;

    public function createAddress(AddressValidator $request){

        $address = $request->user()->addresses()->create([
            'label' => $request->label,
            'given_name' => $request->given_name,
            'family_name' => $request->family_name,
            'organization' => $request->organization,
            'country_code' => $request->country_code,
            'street' => $request->street,
            'state' => $request->state,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_primary' => $request->is_primary,
            'is_billing' => $request->is_billing,
            'is_shipping' => $request->is_shipping,
        ]);
        return $this->successResponse([
            'address'   =>  $address
        ]);

    }

    public function listAllAddress(Request $request){
        $address = Address::whereAddressableType('App\Models\User')
        ->whereAddressableId($request->user()->id)
        ->get();
        if($address){
            return $this->successResponse([
                'address'   =>  $address
            ]);
        } else {
            return $this->errorResponse('no address found');
        }
    }

    public function find($id){
        $address = app('sturt.addresses.address')->find($id);
        if($address){
            return $this->successResponse([
                'address'   =>  $address
            ]);
        } else {
            return $this->errorResponse('no address found');
        }
    }

    public function findWithinRadius(AddressFindByRadiusValidator $request){
        $address = $request->user()->lat($request->lat)
            ->lng($request->lng)
            ->within($$request->km, 'kilometers')->get();
        if($address){
            return $this->successResponse([
                'address'   =>  $address
            ]);
        } else {
            return $this->errorResponse('no address found');
        }

    }

    public function findAllUsersWithinRadius(AddressFindByRadiusValidator $request,$model){
        if ($model instanceof Model) {
            $address = $model::findByDistance($request->km,'kilometers',$request->lat,$request->lng)->get();
            if ($address) {
                return $this->successResponse([
                    'address' => $address
                ]);
            } else {
                return $this->errorResponse('no address found');
            }
        } else {
            return $this->errorResponse('not a valid model');
        }

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
