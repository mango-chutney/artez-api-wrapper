<?php

namespace MangoChutney\ArtezApiWrapper\Api;

use MangoChutney\ArtezApiWrapper\Helpers;

class Webgetservice
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

        $this->klein->with($this->config['route'].'/webgetservice', function () {
            $this->klein->respond('GET', '/teamByTeamID', function ($request, $response) {
                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/webgetservice/get.asmx/teamByTeamID?languageCode=&teamID='.
                                    $request->paramsGet()->get('teamID')
                            )
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/teamSearchReg', function ($request, $response) {
                $params = $request->paramsGet();
                $getVariables = [
                    'eventID' => $params->get('eventID'),
                    'teamName' => $params->get('teamName'),
                    'captainFirstName' => $params->get('captainFirstName'),
                    'captainLastName' => $params->get('captainLastName'),
                    'eventLocationID' => $params->get('eventLocationID'),
                    'eventLocationStartTimeID' => $params->get('eventLocationStartTimeID'),
                ];

                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/webgetservice/get.asmx/teamSearchReg?'.http_build_query($getVariables)
                            )
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('POST', '/mobileParticipant', function ($request, $response) {
                $body = json_decode(file_get_contents('php://input'), true);

                $options = [
                    'form_params' => $body,
                ];

                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/webgetservice/mobile.asmx/mobileParticipant'),
                        $body,
                        $options
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('GET', '/postMessageBoardMain', function ($request, $response) {
                $params = $request->paramsGet();
                $getVariables = [
                    'corporateTeamID' => $params->get('corporateTeamID'),
                    'eventID' => $params->get('eventID'),
                    'locationID' => $params->get('locationID'),
                    'personID' => $params->get('personID'),
                    'registrantID' => $params->get('registrantID'),
                    'teamID' => $params->get('teamID'),
                    'author' => $params->get('author'),
                    'messageText' => $params->get('messageText'),
                    'langPref' => $params->get('langPref'),
                    'source' => $params->get('source'),
                ];

                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL(
                                '/webgetservice/get.asmx/postMessageBoardMain?'.http_build_query($getVariables)
                            )
                    ),
                    $response
                )->send();
            });
        });
    }
}
