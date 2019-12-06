<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use Response;
use JWTFactory;
use App\Http\Controllers\Controller;



class ApiController extends Controller
{

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public static function responseBuilder($message, $data, $errors = [], $status = true)
    {
        // dd($data);
        $statusCode = $status ? 200 : 422;
        $result = [
            "data" => $data,
            "status" => $status,
            "message" => $message,
            "errors" => $errors
        ];
        return response()->json($result, $statusCode);
    }

    protected function createTokenFromPaypload($type)
    {
        if (!in_array($type, ['service', 'account', 'laragen'])) {
            return response()->json(['error' => 'Unsupported type.']);
        }

        $customClaims = ['sub'   => env('API_ID'), 'lgn' => 'laragen', 'type' => 'service'];
        $factory = JWTFactory::customClaims($customClaims);
        $payload = $factory->make();
        $token = JWTAuth::encode($payload);

        $parsedToken = JWTAuth::parseToken();
        dd($parsedToken);

        return $token;

        if (!$token) {
            $status = false;
            $errors = [
                "login" => "Error creating token",
            ];
            $message = "token generation Failed";
        } else {
            $message = "App api-token for /" . $type . "/ created!";
            $data = [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ];
        }
        return $this->responseBuilder($message, $data, $errors, $status);
    }
}
