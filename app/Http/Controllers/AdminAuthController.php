<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login(Request $request){
        $http = new \GuzzleHttp\Client;
        try{
            // return $request->all();
            $response = $http->post('http://multiauth.test/oauth/token',[
                'form_params' => [
                    'grant_type'=> 'password',
                    'client_id' => 2,
                    'client_secret' => 'k05tLZxJsQPoYxR36tqxlcCicvvfrsn7ZAYOOUwF',
                    'username' => $request->username,
                    'password' => $request->password,
                    'provider' => 'admins'
                ]
            ]);
            return $response->getBody();
        }catch (\GuzzleHttp\Exception\BadResponseException $e){
            if($e->getCode() === 400){
                return response()->json('Invalid Request',$e->getCode());
            }elseif($e->getCode() === 401){
                return response()->json('Your Credential are incorrect',$e->getCode());
            }
            return response()->json('Something gone wrong.',$e->getCode());
        }
    }
}
