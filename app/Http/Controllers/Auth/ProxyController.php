<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProxyController extends Controller
{

    public function __construct()
    {
    }

    public function swapCode(Request $request)
    {
        $http = new \GuzzleHttp\Client(['base_uri' => 'http://dev.invsys']);

        $response = $http->request('POST', '/oauth/token', [
            'json' => [
                'grant_type' => 'authorization_code',
                'client_id' => '1',
                'client_secret' => 'ZAAOLwANThmymwelrHkEIaatR4GX6F0WBgtxKpyg',
                'redirect_uri' => 'http://localhost:3000',
                'code' => $request->code,
            ],
        ]);

        $body = json_decode((string) $response->getBody(), true);

        return response()->json($body);
    }
}
