<?php

require __DIR__.'/vendor/autoload.php';

use CNIT\NetCollect\Auth\Authentication;
use CNIT\NetCollect\Manager\AccountManager;

$authentication = (new Authentication('test', 'test'))->auth();
$account = new AccountManager($authentication);
$response = $account->register('DAKIA', 'Franck', AccountManager::CIVILITE_MONSIEUR, '49929598', '52797005');

var_dump($response);