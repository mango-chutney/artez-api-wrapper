<?php

namespace MangoChutney\ArtezApiWrapper;

class Registrant extends Api
{
    public function init()
    {
        $group = $this->config['path'];

        $this->router->addGroup($group.'/registrant', function (\FastRoute\RouteCollector $router) {
            $router->addRoute('POST', '/uploadImageItem', function () {
                $file = $_FILES['attachedFile'];

                $body = [
                    [
                        'name' => 'eventId',
                        'contents' => $_POST['eventId'],
                    ],
                    [
                        'name' => 'username',
                        'contents' => $_POST['username'],
                    ],
                    [
                        'name' => 'password',
                        'contents' => $_POST['password'],
                    ],
                    [
                        'name' => 'registrantId',
                        'contents' => $_POST['registrantId'],
                    ],
                    [
                        'name' => 'organizationId',
                        'contents' => $_POST['organizationId'],
                    ],
                    [
                        'name' => 'token',
                        'contents' => $_POST['token'],
                    ],
                    [
                        'name' => 'userType',
                        'contents' => $_POST['userType'],
                    ],
                    [
                        'name' => 'pageType',
                        'contents' => $_POST['pageType'],
                    ],
                    [
                        'name' => 'languageCode',
                        'contents' => $_POST['languageCode'],
                    ],
                    [
                        'name' => 'itemID',
                        'contents' => $_POST['itemID'],
                    ],
                    [
                        'name' => 'responseType',
                        'contents' => $_POST['responseType'],
                    ],
                    [
                        'name' => 'postType',
                        'contents' => 'uploadImageItem',
                    ],
                    [
                        'name' => 'attachedFile',
                        'contents' => fopen($file['tmp_name'], 'r'),
                        'filename' => $file['name'].'.jpg',
                    ],
                ];

                $options = [
                    'multipart' => $body,
                ];

                $this->handleRoute('/registrant/personalizationPost.aspx', null, $body, $options);
            });

            $router->addRoute('POST', '/setImageItem', function () {
                $body = [
                    [
                        'name' => 'eventId',
                        'contents' => $_POST['eventId'],
                    ],
                    [
                        'name' => 'username',
                        'contents' => $_POST['username'],
                    ],
                    [
                        'name' => 'password',
                        'contents' => $_POST['password'],
                    ],
                    [
                        'name' => 'registrantId',
                        'contents' => $_POST['registrantId'],
                    ],
                    [
                        'name' => 'organizationId',
                        'contents' => $_POST['organizationId'],
                    ],
                    [
                        'name' => 'token',
                        'contents' => $_POST['token'],
                    ],
                    [
                        'name' => 'userType',
                        'contents' => $_POST['userType'],
                    ],
                    [
                        'name' => 'pageType',
                        'contents' => $_POST['pageType'],
                    ],
                    [
                        'name' => 'languageCode',
                        'contents' => $_POST['languageCode'],
                    ],
                    [
                        'name' => 'mediaTitle',
                        'contents' => $_POST['mediaTitle'],
                    ],
                    [
                        'name' => 'mediaDescription',
                        'contents' => $_POST['mediaDescription'],
                    ],
                    [
                        'name' => 'mediaPath',
                        'contents' => $_POST['mediaPath'],
                    ],
                    [
                        'name' => 'defaultStatus',
                        'contents' => $_POST['defaultStatus'],
                    ],
                    [
                        'name' => 'imageID',
                        'contents' => $_POST['imageID'],
                    ],
                    [
                        'name' => 'thumbnailID',
                        'contents' => $_POST['thumbnailID'],
                    ],
                    [
                        'name' => 'itemID',
                        'contents' => $_POST['itemID'],
                    ],
                    [
                        'name' => 'responseType',
                        'contents' => $_POST['responseType'],
                    ],
                    [
                        'name' => 'postType',
                        'contents' => 'setImageItem',
                    ],
                ];

                $options = [
                    'multipart' => $body,
                ];

                $this->handleRoute('/registrant/personalizationPost.aspx', null, $body, $options);
            });
        });
    }
}
