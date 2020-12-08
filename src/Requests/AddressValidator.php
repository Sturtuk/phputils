<?php


namespace sturtuk\phputils\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class AddressValidator extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'label' => 'required',
            'given_name' => 'required',
            'family_name' => 'required',
            'organization' => 'required',
            'country_code' => 'required',
            'street' => 'required',
            'state' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'is_primary' => 'required|boolean',
            'is_billing' => 'required|boolean',
            'is_shipping' => 'required|boolean',
        ];
    }

}
