<?php

use GuzzleHttp\Client;

function call_api($url, $method, $data = false){
    $client = new Client();
    $response = $client->request($method, $url, [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ],
        'json' => $data
    ]);
    return json_decode($response->getBody()->getContents(), true);
}