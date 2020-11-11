<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                    'client_secret' => '9TZpgweb7PpjbGZg06M3j60IhLi4CgQr1i4wQJIQ',
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

    public function logoutApi(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
