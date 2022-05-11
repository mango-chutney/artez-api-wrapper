<?php

require __DIR__.'/helpers/makeRequest.php';

require __DIR__.'/helpers/prepareResponse.php';

require __DIR__.'/helpers/withBaseURL.php';

function Regapi($klein, $config)
{
    $klein->respond('GET', '/Constituents', function ($request, $response) {
        prepareResponse(
            makeRequest(
                $config,
                $request->method(),
                withBaseURL(
                    $config,
                    '/api/Constituents?ConstituentID='.
                        $request->paramsGet()->get('ConstituentID')
                )
            ),
            $response
        )->send();
    });

    // $klein->respond('PUT', '/Constituents', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL(
    //                 '/api/Constituents?ConstituentID='.
    //                     $request->paramsGet()->get('ConstituentID')
    //             ),
    //             file_get_contents('php://input')
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('POST', '/Constituents', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/api/Constituents'),
    //             file_get_contents('php://input')
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('GET', '/Locations', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL(
    //                 '/api/Locations?EventID='.
    //                     $request->paramsGet()->get('EventID')
    //             )
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('GET', '/Logins', function ($request, $response) {
    //     $params = $request->paramsGet();
    //     $getVariables = [
    //         'username' => $params->get('username'),
    //         'password' => $params->get('password'),
    //     ];

    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/api/Logins?'.http_build_query($getVariables))
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('GET', '/RegistrationTypes', function (
    //     $request,
    //     $response
    // ) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL(
    //                 '/api/RegistrationTypes?LocationID='.
    //                     $request->paramsGet()->get('LocationID')
    //             )
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('GET', '/TeamTypes', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL(
    //                 '/api/TeamTypes?LocationID='.
    //                     $request->paramsGet()->get('LocationID')
    //             )
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('GET', '/Teams', function ($request, $response) {
    //     $params = $request->paramsGet();

    //     $getVariables = [
    //         'EventID' => $params->get('EventID'),
    //         'TeamName' => $params->get('TeamName'),
    //         'TeamCaptainFirstName' => $params->get('TeamCaptainFirstName'),
    //         'TeamCaptainLastName' => $params->get('TeamCaptainLastName'),
    //     ];

    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/api/Teams?'.http_build_query($getVariables))
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('GET', '/CorporateTeams', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL(
    //                 '/api/CorporateTeams?EventID='.
    //                     $request->paramsGet()->get('EventID')
    //             )
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('POST', '/Teams', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/api/Teams'),
    //             file_get_contents('php://input')
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('GET', '/UserDefinedFields', function (
    //     $request,
    //     $response
    // ) {
    //     $params = $request->paramsGet();
    //     $getVariables = [
    //         'EventID' => $params->get('EventID'),
    //         'RegistrationID' => $params->get('RegistrationID'),
    //         'TeamID' => $params->get('TeamID'),
    //     ];

    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL(
    //                 '/api/UserDefinedFields?'.http_build_query($getVariables)
    //             )
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('PUT', '/UserDefinedFields', function (
    //     $request,
    //     $response
    // ) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL(
    //                 '/api/UserDefinedFields?RegistrationID='.
    //                     $request->paramsGet()->get('RegistrationID')
    //             ),
    //             file_get_contents('php://input')
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('GET', '/VanityUrl', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL(
    //                 '/api/VanityUrl?vanityurl='.
    //                     $request->paramsGet()->get('vanityurl')
    //             )
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('POST', '/Transactions', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/api/Transactions'),
    //             file_get_contents('php://input')
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('POST', '/Registrations', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/api/Registrations'),
    //             file_get_contents('php://input')
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('PUT', '/Transactions/[:transactionId]', function (
    //     $request,
    //     $response
    // ) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/api/Transactions/'.$request->transactionId),
    //             file_get_contents('php://input')
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('GET', '/Registrations/[:registrationId]', function (
    //     $request,
    //     $response
    // ) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/Registrations/'.$request->registrationId)
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('PUT', '/Registrations/[:registrationId]', function (
    //     $request,
    //     $response
    // ) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/api/Registrations/'.$request->registrationId),
    //             file_get_contents('php://input')
    //         ),
    //         $response
    //     )->send();
    // });

    // $klein->respond('PUT', '/Teams/[:teamId]', function ($request, $response) {
    //     prepareResponse(
    //         makeRequest(
    //             $request->method(),
    //             withBaseURL('/api/Teams/'.$request->teamId),
    //             file_get_contents('php://input')
    //         ),
    //         $response
    //     )->send();
    // });
}
