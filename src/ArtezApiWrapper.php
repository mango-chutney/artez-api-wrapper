<?php

namespace MangoChutney\ArtezApiWrapper;

require __DIR__.'/Regapi.php';

use Klein;

class ApiWrapper
{
    public function start($orgId, $apiKey, $baseUrl)
    {
        $klein = new \Klein\Klein();

        $klein->with('/regapi', function () use ($klein) {
            Regapi($klein, [
                'orgId' => $orgId,
                'apiKey' => $apiKey,
                'baseUrl' => $baseUrl,
            ]);
        });
    }
}
