<?php

namespace Guiar\Subscription;

use GuzzleHttp\Client as GuzzleClient;

class PayPalClient
{
    private $client;
    private $accessToken;

    public function __construct()
    {
        if (config('paypal.settings.mode') === 'live') {
            $clientId = config('paypal.live_client_id');
            $secret = config('paypal.live_secret');
            $baseUri = 'https://api-m.paypal.com';
        } else {
            $clientId = config('paypal.sandbox_client_id');
            $secret = config('paypal.sandbox_secret');
            $baseUri = 'https://api-m.sandbox.paypal.com';
        }

        $this->client = new GuzzleClient(['base_uri' => $baseUri]);
        $this->accessToken = $this->getAccessToken($clientId, $secret);
        // dd($this->accessToken);
    }

    private function getAccessToken($clientId, $secret)
    {
        $response = $this->client->request('POST', '/v1/oauth2/token', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'body' => 'grant_type=client_credentials',
                'auth' => [
                    $clientId, $secret, 'basic'
                ]
            ]
        );

        $data = json_decode($response->getBody(), true);
        return $data['access_token'];
    }

    private function getHeaders()
    {
        return [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->accessToken,
            'Content-Type' => 'application/json'
        ];
    }

    public function getPlans()
    {
        $response = $this->client->request('GET', '/v1/billing/plans', [
                'headers' => $this->getHeaders()
            ]
        );

        return json_decode($response->getBody(), true);
    }

    public function createPlans($body)
    {
        $response = $this->client->request('POST', '/v1/billing/plans', [
                'json'    => $body,
                'headers' => $this->getHeaders()
            ]
        );

        return json_decode($response->getBody(), true);
    }

    public function createProduct($body)
    {
        $response = $this->client->request('POST', '/v1/catalogs/products', [
                'json'    => $body,
                'headers' => $this->getHeaders()
            ]
        );

        return json_decode($response->getBody(), true);
    }

    public function getSubscription($subscription_id, $associative=false){
        $endpoint = '/v1/billing/subscriptions/' . $subscription_id;
        $response = $this->client->request('GET', $endpoint, [
            'headers' => $this->getHeaders()
        ]
    );

    return json_decode($response->getBody(), $associative);
    }


    public function cancelSubscription($subscriptionId, $body)
    {
        $endpoint = "/v1/billing/subscriptions/$subscriptionId/cancel";
        $response = $this->client->request('POST', $endpoint, [
                'json'    => $body,
                'headers' => $this->getHeaders()
        ]
        );

        return $response->getStatusCode();
    }
}
