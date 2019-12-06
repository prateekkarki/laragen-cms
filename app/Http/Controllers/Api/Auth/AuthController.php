<?php

namespace App\Http\Controllers\Api\Auth;

use JWTAuth;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Api\ApiController;

class AuthController extends ApiController
{
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $payload = $request->all();
        $errors = [];
        $data = [];
        $message = "";
        $status = true;
        $validator = Validator::make($payload, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            $status = false;
            $errors = $validator->errors();
            $message = "Login Failed";
            return $this->responseBuilder($message, $data, $errors, $status);
        }
        $credentials = $request->only("email", "password");
        $token = auth('api')->claims(['lgn' => 'laragen'])->attempt($credentials);
        if (!$token) {
            $status = false;
            $errors = [
                "login" => "Invalid username or password",
            ];
            $message = "Login Failed";
        } else {
            $message = "Login Successfull";
            $user = auth('api')->user()->toArray();
            $jwt_data = [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60 * 60
            ];
            $data = $user + $jwt_data;
        }
        return $this->responseBuilder($message, $data, $errors, $status);
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $errors = [];
        $data = [];
        $message = "";
        $status = true;
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            $status = false;
            $errors = $validator->errors();
            $message = response()->json($validator->errors());
            return $this->responseBuilder($message, $data, $errors, $status);
        }
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $user = User::first();
        $role = Role::where('name', '=', $request->input('role'))->first();
        //$user->attachRole($request->input('role'));
        $user->roles()->attach($role->id);

        // $role = Role::where('name', '=', $request->input('role'))->first();
        // $permission = Permission::where('name', '=', $request->input('name'))->first();
        // $role->attachPermission($permission);

        $token = JWTAuth::fromUser($user);

        $message = "Registration Successfull";
        $data = [
            'access_token' => $token,
            // 'access_token' => Response::json(compact('token')),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
        return $this->responseBuilder($message, $data, $errors, $status);
    }

    public function logout(Request $request)
    {
        $errors = [];
        $data = [];
        $message = "";
        $status = true;

        // Get JWT Token from the request header key "Authorization"
        $token = $request->header('Authorization');
        // Invalidate the token
        try {
            JWTAuth::invalidate($token);
            $status = true;
            $message = 'User logged out successfully';
        } catch (JWTException $exception) {
            $status = false;
            $errors = $exception->getMessage();
            $message = 'Sorry, something went wrong.';
        }
        return $this->responseBuilder($message, $data, $errors, $status);
    }

    public function forgetPassword()
    { }

    public function resetPassword()
    { }
}
