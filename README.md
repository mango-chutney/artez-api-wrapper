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
    'route' => '/artez',
];

$wrapper = new ApiWrapper($config);

$wrapper->start();

```

## Lint

`composer lint`
