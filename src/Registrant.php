<?php

namespace MangoChutney\ArtezApiWrapper;

class Registrant extends Api
{
    public function init()
    {
        $group = $this->config['path'];

        $this->router->addGroup($group.'/registrant', function (\FastRoute\RouteCollector $router) {
            $router->addRoute('POST', '/personalizationPost.aspx', function () {
                $postType = $_POST['postType'];

                $username = $_POST['username'];

                $password = $_POST['password'];

                $body = [
                    [
                        'name' => 'eventID',
                        'contents' => $_POST['eventID'],
                    ],
                    [
                        'name' => 'registrantID',
                        'contents' => $_POST['registrantID'],
                    ],
                    [
                        'name' => 'teamID',
                        'contents' => $_POST['teamID'],
                    ],
                    [
                        'name' => 'corporateTeamID',
                        'contents' => $_POST['corporateTeamID'],
                    ],
                    [
                        'name' => 'organizationID',
                        'contents' => $_POST['organizationID'],
                    ],
                    [
                        'name' => 'itemID',
                        'contents' => $_POST['itemID'],
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
                        'name' => 'postType',
                        'contents' => $postType,
                    ],
                    [
                        'name' => 'languageCode',
                        'contents' => $_POST['languageCode'],
                    ],
                    [
                        'name' => 'responseType',
                        'contents' => $_POST['responseType'],
                    ],
                ];

                if (null != $username) {
                    $body[] = [
                        'name' => 'username',
                        'contents' => $username,
                    ];
                }

                if (null != $password) {
                    $body[] = [
                        'name' => 'password',
                        'contents' => $password,
                    ];
                }

                if ('uploadImageItem' == $postType) {
                    $file = $_FILES['attachedFile'];

                    $extensions = [
                        'image/jpeg' => '.jpg',
                        'image/png' => '.png',
                        'image/gif' => '.gif',
                    ];

                    $body[] = [
                        'name' => 'attachedFile',
                        'contents' => fopen($file['tmp_name'], 'r'),
                        'filename' => $file['name'].$extensions[$file['type']],
                    ];
                } elseif ('setImageItem' == $postType) {
                    $body[] = [
                        'name' => 'mediaTitle',
                        'contents' => $_POST['mediaTitle'],
                    ];

                    $body[] = [
                        'name' => 'mediaDescription',
                        'contents' => $_POST['mediaDescription'],
                    ];

                    $body[] = [
                        'name' => 'mediaPath',
                        'contents' => $_POST['mediaPath'],
                    ];

                    $body[] = [
                        'name' => 'defaultStatus',
                        'contents' => $_POST['defaultStatus'],
                    ];

                    $body[] = [
                        'name' => 'imageID',
                        'contents' => $_POST['imageID'],
                    ];

                    $body[] = [
                        'name' => 'thumbnailID',
                        'contents' => $_POST['thumbnailID'],
                    ];
                } elseif ('updateMediaItemDisplayStatus' == $postType) {
                    $body[] = [
                        'name' => 'displayStatus',
                        'contents' => $_POST['displayStatus'],
                    ];
                }

                $options = [
                    'multipart' => $body,
                ];

                $this->handleRoute('/registrant/personalizationPost.aspx', null, $body, $options);
            });
        });
    }
}
