<?php

use CNIT\NetCollect\Auth\Authentication;

// Authentication
$key = "test";
$secret = "test";

$authentication = (new Authentication($key, $secret))->auth();

return $authentication;