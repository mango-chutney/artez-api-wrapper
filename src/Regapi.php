<?php

namespace MangoChutney\ArtezApiWrapper;

class Regapi extends Api
{
    public function init()
    {
        $group = $this->config['path'];

        $this->router->addGroup($group.'/regapi', function (\FastRoute\RouteCollector $router) {
            $router->addRoute('GET', '/Constituents', function () {
                $this->handleRoute('/api/Constituents', ['ConstituentID']);
            });

            $router->addRoute('POST', '/Constituents', function () {
                $this->handleRoute('/api/Constituents', null, file_get_contents('php://input'));
            });

            $router->addRoute('GET', '/Locations', function () {
                $this->handleRoute('/api/Locations', ['EventID']);
            });

            $router->addRoute('GET', '/Logins', function () {
                $this->handleRoute('/api/Logins', ['username', 'password']);
            });

            $router->addRoute('GET', '/RegistrationTypes', function () {
                $this->handleRoute('/api/RegistrationTypes', ['LocationID']);
            });

            $router->addRoute('GET', '/TeamTypes', function () {
                $this->handleRoute('/api/TeamTypes', ['LocationID']);
            });

            $router->addRoute('GET', '/Teams', function () {
                $this->handleRoute('/api/Teams', ['EventID', 'TeamName', 'TeamCaptainFirstName', 'TeamCaptainLastName']);
            });

            $router->addRoute('GET', '/CorporateTeams', function () {
                $this->handleRoute('/api/CorporateTeams', ['EventID']);
            });

            $router->addRoute('POST', '/Teams', function () {
                $this->handleRoute('/api/Teams', null, file_get_contents('php://input'));
            });

            $router->addRoute('GET', '/UserDefinedFields', function () {
                $this->handleRoute('/api/UserDefinedFields', ['EventID', 'RegistrationID', 'TeamID']);
            });

            $router->addRoute('PUT', '/UserDefinedFields', function () {
                $this->handleRoute('/api/UserDefinedFields', ['RegistrationID'], file_get_contents('php://input'));
            });

            $router->addRoute('GET', '/VanityUrl', function () {
                $this->handleRoute('/api/VanityUrl', ['vanityurl']);
            });

            $router->addRoute('POST', '/Transactions', function () {
                $this->handleRoute('/api/Transactions', null, file_get_contents('php://input'));
            });

            $router->addRoute('POST', '/Registrations', function () {
                $this->handleRoute('/api/Registrations', null, file_get_contents('php://input'));
            });

            $router->addRoute('PUT', '/Transactions/{transactionId}', function ($transactionId) {
                $this->handleRoute('/api/Transactions/'.$transactionId, null, file_get_contents('php://input'));
            });

            $router->addRoute('GET', '/Registrations/{registrationId}', function ($registrationId) {
                $this->handleRoute('/api/Registrations/'.$registrationId);
            });

            $router->addRoute('PUT', '/Registrations/{registrationId}', function ($registrationId) {
                $this->handleRoute('/api/Registrations/'.$registrationId, null, file_get_contents('php://input'));
            });

            $router->addRoute('PUT', '/Teams/{teamId}', function ($teamId) {
                $this->handleRoute('/api/Teams/'.$teamId, null, file_get_contents('php://input'));
            });
        });
    }
}
