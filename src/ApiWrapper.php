<?php

namespace MangoChutney\ArtezApiWrapper;

use MangoChutney\ArtezApiWrapper\Api\Regapi;
use MangoChutney\ArtezApiWrapper\Api\Registrant;
use MangoChutney\ArtezApiWrapper\Api\Webgetservice;

class ApiWrapper
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function start()
    {
        $klein = new \Klein\Klein();

        $regapi = new Regapi($this->config, $klein);

        $regapi->init();

        $webgetservice = new Webgetservice($this->config, $klein);

        $webgetservice->init();

        $registrant = new Registrant($this->config, $klein);

        $registrant->init();

        $klein->dispatch();
    }
}
