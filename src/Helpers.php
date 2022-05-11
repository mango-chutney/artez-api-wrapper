<?php

namespace MangoChutney\ArtezApiWrapper;

class Helpers
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function makeRequest($method, $query, $body = null, $mergeOptions = null)
    {
        $client = new \GuzzleHttp\Client();

        $options = [
            'allow_redirects' => true,
            'auth' => [
                $this->config['orgId'],
                $this->config['apiKey'],
            ],
            'curl.options' => [
                CURLOPT_FORBID_REUSE => true,
                CURLOPT_FRESH_CONNECT => true,
                CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
            ],
            // don't throw an exception if artez returned an error status
            'http_errors' => false,
            'synchronous' => true, // 4head
        ];

        if (null != $body && 'GET' != $method) {
            if (null != $mergeOptions) {
                $options = array_merge($options, $mergeOptions);
            } else {
                $options = array_merge($options, ['json' => json_decode($body)]);
            }
        }

        return $client->send(
            new \GuzzleHttp\Psr7\Request($method, $query),
            $options
        );
    }

    public function prepareResponse($request, $response)
    {
        foreach ($request->getHeaders() as $name => $values) {
            if (0 == substr_compare($name, 'mode=block', 0, 10)) {
                continue; // Ignore this invalid header
            }

            $response->header($name, implode(', ', $values));
        }

        $response->code($request->getStatusCode());
        $response->body($request->getBody());

        return $response;
    }

    public function withBaseURL($query)
    {
        return $this->config['baseUrl'].$query;
    }
}
