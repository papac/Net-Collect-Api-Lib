<?php

namespace CNIT\NetCollect\Auth;

class Token
{
    /**
     * Define the token value
     *
     * @var string
     */
    private $token;

    /**
     * Define the error code
     *
     * @var int
     */
    private $code;
    
    /**
     * Define the error message
     *
     * @var string
     */
    private $content;

    /**
     * Token constructor
     *
     * @param string $token
     * @param string $code
     * @param string $content
     */
    public function __construct($token, $code, $content)
    {
        $this->code = $code;
        $this->token = $token;
        $this->content = $content;
    }

    /**
     * Get the authentication token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get the authentication code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the authentication content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}