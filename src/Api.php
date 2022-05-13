<?php

namespace MangoChutney\ArtezApiWrapper;

abstract class Api
{
    protected $router;
    protected $config;

    public function __construct($config, $router)
    {
        $this->config = $config;
        $this->router = $router;
    }

    abstract public function init();

    protected function handleRoute($uri, $params = null, $body = null, $mergeOptions = null)
    {
        $query = $this->withBaseUrl($uri.$this->createQueryString($params));

        $method = $_SERVER['REQUEST_METHOD'];

        $request = $this->makeRequest($method, $query, $body, $mergeOptions);

        $response = $this->createResponse($request);

        echo $response;
    }

    private function createQueryString($params)
    {
        $data = [];

        foreach ($params as $name) {
            $data[$name] = $this->getQueryParam($name);
        }

        return '?'.http_build_query($data);
    }

    private function getQueryParam($name)
    {
        $params = [];

        $queryString = $_SERVER['QUERY_STRING'];

        parse_str($queryString, $params);

        if (array_key_exists($name, $params)) {
            return $params[$name];
        }

        return '';
    }

    private function makeRequest($method, $query, $body = null, $mergeOptions = null)
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
            'synchronous' => true,
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

    private function createResponse($request)
    {
        foreach ($request->getHeaders() as $name => $values) {
            if (0 == substr_compare($name, 'mode=block', 0, 10)) {
                // ignore this invalid header
                continue;
            }

            header($name.':'.implode(', ', $values));
        }

        http_response_code($request->getStatusCode());

        if ($request->getBody()) {
            return $request->getBody();
        }

        return '';
    }

    private function withBaseUrl($query)
    {
        return $this->config['baseUrl'].$query;
    }
}
