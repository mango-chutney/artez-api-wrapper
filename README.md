# Artez API Wrapper

## Install
`composer require mango-chutney/artez-api-wrapper`

## Usage

```php
use MangoChutney\ArtezApiWrapper\ApiWrapper;

$config = [
    'orgId' => 'ARTEZ_ORG_ID',
    'apiKey' => 'ARTEZ_API_KEY',
    'baseUrl' => 'ARTEZ_BASE_URL',
    'path' => '/api',
];

$wrapper = new ApiWrapper($config);

$wrapper->start();

```

## Lint

`composer lint`

## Test

`php -S localhost:8000 router.php`
