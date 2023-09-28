<?php

namespace MangoChutney\ArtezApiWrapper;

class Webgetservice extends Api
{
    public function init()
    {
        $group = $this->config['path'];

        $this->router->addGroup($group.'/webgetservice', function (\FastRoute\RouteCollector $router) {
            $router->addRoute('GET', '/get.asmx/getEventFundraisingTotals', function () {
                $this->handleRoute('/webgetservice/get.asmx/getEventFundraisingTotals', ['eventID', 'loginOrgID', 'locationExportID', 'source']);
            });

            $router->addRoute('GET', '/get.asmx/getMessageBoard', function () {
                $this->handleRoute('/webgetservice/get.asmx/getMessageBoard', ['teamID', 'registrantID', 'personID', 'source']);
            });

            $router->addRoute('GET', '/get.asmx/getParticipantScoreBoard', function () {
                $this->handleRoute('/webgetservice/get.asmx/getParticipantScoreBoard', ['eventID', 'sortBy', 'listItemCount', 'externalQuestionID', 'externalAnswerID', 'languageCode', 'source']);
            });

            $router->addRoute('GET', '/get.asmx/getRegistrant', function () {
                $this->handleRoute('/webgetservice/get.asmx/getRegistrant', ['registrantID', 'uniqueID', 'source']);
            });

            $router->addRoute('GET', '/get.asmx/getTeamScoreBoard', function () {
                $this->handleRoute('/webgetservice/get.asmx/getTeamScoreBoard', ['eventID', 'sortBy', 'listItemCount', 'externalQuestionID', 'externalAnswerID', 'languageCode', 'source']);
            });

            $router->addRoute('POST', '/mobile.asmx/mobileParticipant', function () {
                $body = file_get_contents('php://input');

                $options = [
                    'body' => $body,
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                    ],
                ];

                $this->handleRoute('/webgetservice/mobile.asmx/mobileParticipant', null, $body, $options);
            });

            $router->addRoute('GET', '/get.asmx/postMessageBoardMain', function () {
                $this->handleRoute('/webgetservice/get.asmx/postMessageBoardMain', ['corporateTeamID', 'eventID', 'locationID', 'personID', 'registrantID', 'teamID', 'author', 'messageText', 'langPref', 'source']);
            });

            $router->addRoute('GET', '/get.asmx/teamByTeamID', function () {
                $this->handleRoute('/webgetservice/get.asmx/teamByTeamID', ['languageCode', 'teamID']);
            });

            $router->addRoute('GET', '/get.asmx/teamSearchReg', function () {
                $this->handleRoute('/webgetservice/get.asmx/teamSearchReg', ['eventID', 'teamName', 'captainFirstName', 'captainLastName', 'eventLocationID', 'eventLocationStartTimeID']);
            });
        });
    }
}
