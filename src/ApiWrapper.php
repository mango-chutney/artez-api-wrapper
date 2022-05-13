<?php

namespace MangoChutney\ArtezApiWrapper;

class ApiWrapper
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function start()
    {
        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $router) {
            (new Regapi($this->config, $router))->init();
            (new Webgetservice($this->config, $router))->init();
            (new Registrant($this->config, $router))->init();
        });

        $httpMethod = $_SERVER['REQUEST_METHOD'];

        $uri = $_SERVER['REQUEST_URI'];

        // strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                break;

            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];

                break;

            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];

                $vars = $routeInfo[2];

                call_user_func_array($handler, $vars);

                break;
        }
    }
}
