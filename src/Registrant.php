<?php

namespace MangoChutney\ArtezApiWrapper;

class Registrant extends Api
{
    public function init()
    {
        $group = $this->config['path'];

        $this->router->addGroup($group.'/registrant', function (\FastRoute\RouteCollector $router) {
            $router->addRoute('POST', '/uploadImageItem', function () {
                $data = json_decode(file_get_contents('php://input'), true);

                $file = $_FILES['attachedFile'];

                $body = [
                    ['name' => 'eventId',
                        'contents' => $data['eventId'],
                    ],
                    [
                        'name' => 'username',
                        'contents' => $data['username'],
                    ],
                    [
                        'name' => 'password',
                        'contents' => $data['password'],
                    ],
                    [
                        'name' => 'registrantId',
                        'contents' => $data['registrantId'],
                    ],
                    [
                        'name' => 'organizationId',
                        'contents' => $data['organizationId'],
                    ],
                    [
                        'name' => 'token',
                        'contents' => $data['token'],
                    ],
                    [
                        'name' => 'userType',
                        'contents' => $data['userType'],
                    ],
                    [
                        'name' => 'pageType',
                        'contents' => $data['pageType'],
                    ],
                    [
                        'name' => 'languageCode',
                        'contents' => $data['languageCode'],
                    ],
                    [
                        'name' => 'itemID',
                        'contents' => $data['itemID'],
                    ],
                    [
                        'name' => 'responseType',
                        'contents' => $data['responseType'],
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
                $data = json_decode(file_get_contents('php://input'), true);

                $body = [
                    [
                        'name' => 'eventId',
                        'contents' => $data['eventId'],
                    ],
                    [
                        'name' => 'username',
                        'contents' => $data['username'],
                    ],
                    [
                        'name' => 'password',
                        'contents' => $data['password'],
                    ],
                    [
                        'name' => 'registrantId',
                        'contents' => $data['registrantId'],
                    ],
                    [
                        'name' => 'organizationId',
                        'contents' => $data['organizationId'],
                    ],
                    [
                        'name' => 'token',
                        'contents' => $data['token'],
                    ],
                    [
                        'name' => 'userType',
                        'contents' => $data['userType'],
                    ],
                    [
                        'name' => 'pageType',
                        'contents' => $data['pageType'],
                    ],
                    [
                        'name' => 'languageCode',
                        'contents' => $data['languageCode'],
                    ],
                    [
                        'name' => 'mediaTitle',
                        'contents' => $data['mediaTitle'],
                    ],
                    [
                        'name' => 'mediaDescription',
                        'contents' => $data['mediaDescription'],
                    ],
                    [
                        'name' => 'mediaPath',
                        'contents' => $data['mediaPath'],
                    ],
                    [
                        'name' => 'defaultStatus',
                        'contents' => $data['defaultStatus'],
                    ],
                    [
                        'name' => 'imageID',
                        'contents' => $data['imageID'],
                    ],
                    [
                        'name' => 'thumbnailID',
                        'contents' => $data['thumbnailID'],
                    ],
                    [
                        'name' => 'itemID',
                        'contents' => $data['itemID'],
                    ],
                    [
                        'name' => 'responseType',
                        'contents' => $data['responseType'],
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
