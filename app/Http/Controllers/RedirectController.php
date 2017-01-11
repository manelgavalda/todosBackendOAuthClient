<?php

namespace App\Http\Controllers;


class RedirectController extends Controller
{
    public function redirectWithQuery()
    {
        $query = http_build_query([
            'client_id' => '1',
            'redirect_uri' => 'http://oauthclient.dev:8001/auth/callback',
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect('http://localhost:8000/oauth/authorize?'.$query);
    }
}