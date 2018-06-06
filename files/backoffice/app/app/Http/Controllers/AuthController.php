<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
// use Tymon\JWTAuth\Contracts\JWTSubject;
//use JWTAuth;
//use JWTAuthException;

class AuthController extends Controller
{
    // the Auth controller for users registering and logging in remotely

    public function __construct()
    {
      $this->middleware('guest:api');
    }

    public function register(Request $request)
    {
      $user = User::create([
        'user_name' => $request->input('user_name'),
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),

       // 'cover_image' => $fileNameToStore,

        
        'address_street' => $request->input('address_street'),
        'address_number' => $request->input('address_number'),
        'address_postcode' => $request->input('address_postcode'),
        'address_location' => $request->input('address_location'),
        'address_country' => $request->input('address_country'),
        

        //'status' => 'Active',
    ]);          



      $token = auth('api')->login($user);
      $user = auth('api')->user($token);
      return $this->respondWithToken(auth('api')->refresh(),$user);

    }
/*
*
*
*/

    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      if (!$token = auth('api')->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
      $user = auth('api')->user($token);
      return $this->respondWithToken(auth('api')->refresh(),$user);
    }


/*
*
* respond function provides as well token as user in a JSON format
*/

    protected function respondWithToken($token,$user)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60,
        'user' => $user
        
       
      ]);
    }
}
