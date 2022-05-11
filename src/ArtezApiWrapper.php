<?php

namespace MangoChutney\ArtezApiWrapper;

require __DIR__.'/Regapi.php';

use Klein;

class ApiWrapper
{
    public function start($config)
    {
        $klein = new \Klein\Klein();

        $klein->with('/regapi', function () use ($klein) {
            Regapi($klein, $config);
        });
    }
}
