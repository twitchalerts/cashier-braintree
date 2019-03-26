<?php

namespace Laravel\Cashier;

use GuzzleHttp\Client;

class Request
{
    /**
     *
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('payments.billing.api_base'),
            'timeout' => 10,
            'headers' => [
                'Content-Type' => 'application/json',
                'Client-ID' => config('payments.billing.client_id'),
                'Client-Secret' => config('payments.billing.client_secret'),
            ],
        ]);
    }

    /**
     *
     */
    public function sendRequest($endPoint, $params = [], $type = 'POST')
    {
        // make request
        try {
            if ($type === 'GET') {
                $res = $this->client->request($type, $endPoint, [
                    'query' => $params,
                ]);
            } else {
                $res = $this->client->request($type, $endPoint, [
                    'json' => $params
                ]);
            }

            $res = json_decode($res->getBody());
            return $res;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     *
     */
    public function get($endPoint, $params = [])
    {
        return $this->sendRequest($endPoint, $params, 'GET');
    }

    /**
     *
     */
    public function post($endPoint, $params = [])
    {
        return $this->sendRequest($endPoint, $params, 'POST');
    }

    /**
     *
     */
    public function put($endPoint, $params = [])
    {
        return $this->sendRequest($endPoint, $params, 'PUT');
    }

    /**
     *
     */
    public function delete($endPoint, $params = [])
    {
        return $this->sendRequest($endPoint, $params, 'DELETE');
    }
}
