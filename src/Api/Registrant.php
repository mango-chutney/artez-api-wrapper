<?php

namespace MangoChutney\ArtezApiWrapper\Api;

use MangoChutney\ArtezApiWrapper\Helpers;

class Registrant
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

        $this->klein->with($this->config['route'].'/registrant', function () {
            $this->klein->respond('POST', '/uploadImageItem', function ($request, $response) {
                $params = $request->paramsPost();

                $files = $request->files();

                $body = [
                    ['name' => 'eventId',
                        'contents' => $params->get('eventId'),
                    ],
                    [
                        'name' => 'username',
                        'contents' => $params->get('username'),
                    ],
                    [
                        'name' => 'password',
                        'contents' => $params->get('password'),
                    ],
                    [
                        'name' => 'registrantId',
                        'contents' => $params->get('registrantId'),
                    ],
                    [
                        'name' => 'organizationId',
                        'contents' => $params->get('organizationId'),
                    ],
                    [
                        'name' => 'token',
                        'contents' => $params->get('token'),
                    ],
                    [
                        'name' => 'userType',
                        'contents' => $params->get('userType'),
                    ],
                    [
                        'name' => 'pageType',
                        'contents' => $params->get('pageType'),
                    ],
                    [
                        'name' => 'languageCode',
                        'contents' => $params->get('languageCode'),
                    ],
                    [
                        'name' => 'itemID',
                        'contents' => $params->get('itemID'),
                    ],
                    [
                        'name' => 'postType',
                        'contents' => 'uploadImageItem',
                    ],
                    [
                        'name' => 'responseType',
                        'contents' => 'JSON',
                    ],
                    [
                        'name' => 'attachedFile',
                        'contents' => fopen($files->get('attachedFile')['tmp_name'], 'r'),
                        'filename' => $files->get('attachedFile')['name'].'.jpg',
                    ],
                ];

                $options = [
                    'multipart' => $body,
                ];

                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/registrant/personalizationPost.aspx'),
                        $body,
                        $options
                    ),
                    $response
                )->send();
            });

            $this->klein->respond('POST', '/setImageItem', function ($request, $response) {
                $params = $request->paramsPost();

                $body = [
                    [
                        'name' => 'eventId',
                        'contents' => $params->get('eventId'),
                    ],
                    [
                        'name' => 'username',
                        'contents' => $params->get('username'),
                    ],
                    [
                        'name' => 'password',
                        'contents' => $params->get('password'),
                    ],
                    [
                        'name' => 'registrantId',
                        'contents' => $params->get('registrantId'),
                    ],
                    [
                        'name' => 'organizationId',
                        'contents' => $params->get('organizationId'),
                    ],
                    [
                        'name' => 'token',
                        'contents' => $params->get('token'),
                    ],
                    [
                        'name' => 'userType',
                        'contents' => $params->get('userType'),
                    ],
                    [
                        'name' => 'pageType',
                        'contents' => $params->get('pageType'),
                    ],
                    [
                        'name' => 'languageCode',
                        'contents' => $params->get('languageCode'),
                    ],
                    [
                        'name' => 'mediaTitle',
                        'contents' => $params->get('mediaTitle'),
                    ],
                    [
                        'name' => 'mediaDescription',
                        'contents' => $params->get('mediaDescription'),
                    ],
                    [
                        'name' => 'mediaPath',
                        'contents' => $params->get('mediaPath'),
                    ],
                    [
                        'name' => 'defaultStatus',
                        'contents' => $params->get('defaultStatus'),
                    ],
                    [
                        'name' => 'imageID',
                        'contents' => $params->get('imageID'),
                    ],
                    [
                        'name' => 'thumbnailID',
                        'contents' => $params->get('thumbnailID'),
                    ],
                    [
                        'name' => 'itemID',
                        'contents' => $params->get('itemID'),
                    ],
                    [
                        'name' => 'postType',
                        'contents' => 'setImageItem',
                    ],
                    [
                        'name' => 'responseType',
                        'contents' => 'JSON',
                    ],
                ];

                $options = [
                    'multipart' => $body,
                ];

                $this->helpers->prepareResponse(
                    $this->helpers->makeRequest(
                        $request->method(),
                        $this->helpers->withBaseURL('/registrant/personalizationPost.aspx'),
                        $body,
                        $options
                    ),
                    $response
                )->send();
            });
        });
    }
}
