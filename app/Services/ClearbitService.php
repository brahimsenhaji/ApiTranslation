<?php

namespace App\Services;

use GuzzleHttp\Client;

class ClearbitService
{
    protected $client;
    protected $clearbitApiUrl = 'https://logo.clearbit.com/';
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('CLEARBIT_API_KEY');
    }

    public function getLogo(string $domain): ?string
    {
        $url = $this->clearbitApiUrl . $domain;

        try {
            $response = $this->client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey
                ]
            ]);
            if ($response->getStatusCode() === 200) {
                return $url;
            }
        } catch (\Exception $e) {
            return null;
        }
        
        return null;
    }
}
