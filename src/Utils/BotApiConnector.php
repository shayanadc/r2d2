<?php


namespace App\Utils;


use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class BotApiConnector
{
    private $baseUrl = 'https://spaceship.imaginery.api';
    private $client;
    private $clientId = 'r2d2';
    private $clientSecret = 'caspian';
    private $jsonResponse;

    public function __constructor(\JsonResponseInterface $response, Client $client)
    {
        $this->client = $client;
        $this->jsonResponse = $response;
    }

    public function getToken()
    {
        $body = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ];
        $response = $this->client->request('POST', $this->baseUrl . '/token', [
            'json' => $body,
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',
            ]
        ]);

        return $this->jsonResponse->make($response);
    }

    public function getPrison($token)
    {
        $response = $this->client->request('GET', $this->baseUrl . '/prisoner/leia', [
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
        return $this->jsonResponse->make($response);
    }

    public function deleteReactor($token, $id)
    {
        $response = $this->client->request('DELETE', $this->baseUrl . '/reactor/exhaust/' . $id, [
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
        return $this->jsonResponse->make($response);
    }
}