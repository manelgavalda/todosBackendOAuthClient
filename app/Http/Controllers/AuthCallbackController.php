<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Request;

/**
 * Class AuthCallbackController
 * @package App\Http\Controllers
 */
class AuthCallbackController extends Controller
{

    /**
     * @return mixed
     */
    public function makeAuthCallback()
    {
        $http = new Client;

        $response = $http->post('http://todos.dev:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '1',
                'client_secret' => 'AtuhErSrAIzzktbDER2rbLvNAa1xNhxe6JoEjaIO',
                'redirect_uri' => 'http://oauthclient.dev:8001/auth/callback',
                'code' => Request::input('code'),
            ],
        ]);

        $json = json_decode((string)$response->getBody(), true);
        $access_token = $json['access_token'];

        $response2 = $http->get('http://todos.dev:8000/api/v1/task', [
            'headers' => [
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $access_token
            ],
        ]);
        return $json2 = json_decode((string)$response2->getBody(), true);
    }
}