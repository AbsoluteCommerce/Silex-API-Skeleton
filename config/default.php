<?php
use Absolute\SilexApi\Config;

return [
    Config::DEBUG => false,
    Config::SCHEME => 'https',
    Config::HOSTNAME => 'api.acme.com',
    Config::BASE_PATH => '',
    Config::AUTH_HTTP_BASIC => [
        'username' => 'password',
    ],
];
