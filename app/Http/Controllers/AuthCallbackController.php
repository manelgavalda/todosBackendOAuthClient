<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Request;

class AuthCallbackController extends Controller
{

    public function makeAuthCallback()
    {
        $http = new Client;

        $response = $http->post('http://localhost:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '1',
                'client_secret' => 'fEzXFtvaByxTpotFZkJ9yVAzP58mxMECoEqfAfAX',
                'redirect_uri' => 'http://oauthclient.dev:8001/auth/callback',
                'code' => Request::input('code'),
            ],
        ]);

        $json = json_decode((string) $response->getBody(), true);
        $access_token = $json['access_token'];

        $response2 = $http->get('http://localhost:8000/api/v1/task', [
            'headers' => [
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer ".$access_token
            ],
        ]);
        return $json2 = json_decode((string) $response2->getBody(), true);
    }
}