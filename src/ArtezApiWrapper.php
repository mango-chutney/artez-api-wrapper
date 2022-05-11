<?php

namespace MangoChutney\ArtezApiWrapper;

use Klein;

class ArtezApiWrapper
{
    public function start()
    {
        $klein = new Klein();

        $klein->with('/regapi', function () use ($klein) {
            $klein->respond('GET', '/Constituents', function ($request, $response) {
                print_r('Hello World');
            });
        });
    }
}
