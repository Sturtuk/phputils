<?php
namespace sturtuk\phputils\Controllers;

error_reporting(E_ALL ^ E_NOTICE);


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BaseUtilController extends Controller
{

    public function successResponse(array $response, $code = 200)
    {
        return response()->json(array_merge(
            ['status' => $code, 'message' => 'success'], $response
        ));
    }

    public function errorResponse($response)
    {
        return response()->json(
            [
                'status' => 401,
                'message' => 'failed',
                'data' => $response,
            ]
        );
    }

}
