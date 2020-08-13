<?php

namespace CNIT\NetCollect\Manager;

use CNIT\NetCollect\Auth\Token as AuthToken;

abstract class BaseManager
{
    /**
     * Define the Api token instance
     *
     * @var AuthToken
     */
    protected $auth;

    /**
     * AccountManager constructor
     *
     * @param AuthToken $token
     * @return void
     */
    public function __construct(AuthToken $auth)
    {
        $this->auth = $auth;
    }
}