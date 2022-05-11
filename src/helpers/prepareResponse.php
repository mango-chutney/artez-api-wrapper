<?php

function prepareResponse($request, $response)
{
    foreach ($request->getHeaders() as $name => $values) {
        if (0 == substr_compare($name, 'mode=block', 0, 10)) {
            continue; // Ignore this invalid header
        }

        $response->header($name, implode(', ', $values));
    }

    $response->code($request->getStatusCode());
    $response->body($request->getBody());

    return $response;
}
