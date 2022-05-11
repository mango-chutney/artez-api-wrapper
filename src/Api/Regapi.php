<?php

namespace MangoChutney\ArtezApiWrapper\Api;

use MangoChutney\ArtezApiWrapper\Helpers;

class Regapi
{
    private $config;

    private $klein;

    private $helpers;

    public function __construct($config, $klein)
    {
        $this->config = $config;
        $this->klein = $klein;
    }

    public function init()
    {
        $this->helpers = new Helpers($this->config);

        $this->klein->with($this->config['route'].'/regapi', function () {
            $this->klein->respond('GET', '/Constituents', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                    '/api/Constituents?ConstituentID='.
                                        $request->paramsGet()->get('ConstituentID')
                                )
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('PUT', '/Constituents', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/api/Constituents?ConstituentID='.
                                    $request->paramsGet()->get('ConstituentID')
                            ),
                        file_get_contents('php://input')
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('POST', '/Constituents', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/api/Constituents'),
                        file_get_contents('php://input')
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/Locations', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/api/Locations?EventID='.
                                    $request->paramsGet()->get('EventID')
                            )
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/Logins', function ($request, $response) {
                $params = $request->paramsGet();
                $getVariables = [
                    'username' => $params->get('username'),
                    'password' => $params->get('password'),
                ];

                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/api/Logins?'.http_build_query($getVariables))
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/RegistrationTypes', function (
                $request,
                $response
            ) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/api/RegistrationTypes?LocationID='.
                                    $request->paramsGet()->get('LocationID')
                            )
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/TeamTypes', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/api/TeamTypes?LocationID='.
                                    $request->paramsGet()->get('LocationID')
                            )
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/Teams', function ($request, $response) {
                $params = $request->paramsGet();

                $getVariables = [
                    'EventID' => $params->get('EventID'),
                    'TeamName' => $params->get('TeamName'),
                    'TeamCaptainFirstName' => $params->get('TeamCaptainFirstName'),
                    'TeamCaptainLastName' => $params->get('TeamCaptainLastName'),
                ];

                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/api/Teams?'.http_build_query($getVariables))
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/CorporateTeams', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/api/CorporateTeams?EventID='.
                                    $request->paramsGet()->get('EventID')
                            )
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('POST', '/Teams', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/api/Teams'),
                        file_get_contents('php://input')
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/UserDefinedFields', function (
                $request,
                $response
            ) {
                $params = $request->paramsGet();
                $getVariables = [
                    'EventID' => $params->get('EventID'),
                    'RegistrationID' => $params->get('RegistrationID'),
                    'TeamID' => $params->get('TeamID'),
                ];

                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/api/UserDefinedFields?'.http_build_query($getVariables)
                            )
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('PUT', '/UserDefinedFields', function (
                $request,
                $response
            ) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/api/UserDefinedFields?RegistrationID='.
                                    $request->paramsGet()->get('RegistrationID')
                            ),
                        file_get_contents('php://input')
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/VanityUrl', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/api/VanityUrl?vanityurl='.
                                    $request->paramsGet()->get('vanityurl')
                            )
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('POST', '/Transactions', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/api/Transactions'),
                        file_get_contents('php://input')
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('POST', '/Registrations', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/api/Registrations'),
                        file_get_contents('php://input')
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('PUT', '/Transactions/[:transactionId]', function (
                $request,
                $response
            ) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/api/Transactions/'.$request->transactionId),
                        file_get_contents('php://input')
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/Registrations/[:registrationId]', function (
                $request,
                $response
            ) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/Registrations/'.$request->registrationId)
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('PUT', '/Registrations/[:registrationId]', function (
                $request,
                $response
            ) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/api/Registrations/'.$request->registrationId),
                        file_get_contents('php://input')
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('PUT', '/Teams/[:teamId]', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/api/Teams/'.$request->teamId),
                        file_get_contents('php://input')
                    ),
                    $response
                )->send();
            });
        });
    }
}
