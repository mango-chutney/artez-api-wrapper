<?php

require_once './vendor/autoload.php';

use MangoChutney\ArtezApiWrapper\ApiWrapper;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

$dotenv->load();

$config = [
    'orgId' => $_ENV['ARTEZ_ORG_ID'],
    'apiKey' => $_ENV['ARTEZ_API_KEY'],
    'baseUrl' => $_ENV['ARTEZ_BASE_URL'],
    'path' => '/artez',
];

$wrapper = new ApiWrapper($config);

$wrapper->start();
