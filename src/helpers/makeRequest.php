<?php

require __DIR__.'../../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

function makeRequest($config, $method, $query, $body = null, $mergeOptions = null)
{
    $client = new Client();

    $options = [
        'allow_redirects' => true,
        'auth' => [
            $config['orgId'],
            $config['apiKey'],
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
        new Request($method, $query),
        $options
    );
}
