<?php

namespace CNIT\NetCollect\Auth;

use CNIT\NetCollect\CurlHttp;
use CNIT\NetCollect\Auth\Token as AuthToken;

class Authentication
{
    /**
     * Define the secret key
     *
     * @var string
     */
    private $secret;

    /**
     * Define the login
     *
     * @var string
     */
    private $key;

    /**
     * Authentication constructor
     *
     * @param string $key
     * @param string $secret
     */
    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * Make authentication
     *
     * @return AuthToken
     */
    public function auth()
    {
        $payload = ['Key' => $this->key, 'Secret' => $this->secret];

        $response = CurlHttp::request('https://www.net-collect.com/Auth', $payload);

        return new AuthToken($response['Token'], $response['Code'], $response['Contenu']);
    }
}