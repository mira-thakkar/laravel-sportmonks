<?php
/**
 * Created by PhpStorm.
 * User: mirathakkar
 * Date: 06/07/18
 * Time: 3:17 PM
 */

namespace Fanbox\LaravelSportmonks\Services;

use GuzzleHttp\Client;

class Service
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config("sportmonks.api_url"),
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }


    public function get($path, $params = [])
    {
        $data = [];
        $params['api_token'] = config("sportmonks.token");
        $params['timezone'] = config("app.timezone");
        if (!empty($params)) {
            $params = http_build_query($params);

            $path .= '?' . $params;
        }

        $response = $this->client->request('GET', $path);

        if ($response->getStatusCode() === 200) {

            $body = $response->getBody()->getContents();
            $data = json_decode($body);
        }

        return $data;
    }

    public function post($path, $body, $params = [])
    {
        $data = [];

        if (!empty($params)) {
            $params = http_build_query($params);

            $path .= '?' . $params;
        }

        $response = $this->client->request('POST', $path, [
            'body' => $body
        ]);

        if ($response->getStatusCode() === 200) {
            $body = $response->getBody()->getContents();
            $data = json_decode($body);
        }
        return $data;
    }
}
