<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AgeController extends Controller
{
    public function Agify(Request $request) {
        $client = new Client();
        $name = strtolower($request->input('name'));

        $headers = [
            'Content-type' => 'application/x-www-form-urlencoded'
        ];
        $url = "https://api.agify.io/?name=$name";
        // Send Request to Spotify Auth API
        $response = $client->request('GET', $url, 
        [
            'headers' => $headers
        ]);

        $result = json_decode($response->getBody());
        return $result;
    }
}
