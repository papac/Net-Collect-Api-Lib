<?php

require __DIR__.'/vendor/autoload.php';

use CNIT\NetCollect\Auth\Authentication;
use CNIT\NetCollect\Manager\AccountManager;
use CNIT\NetCollect\Manager\TaxPayerManager;
use CNIT\NetCollect\Manager\TransactionManager;

$key = "test";
$secret = "test";
// Authentication
$authentication = (new Authentication($key, $secret))->auth();

// Account Manager
$account_manager = new AccountManager($authentication);
// Register a new account
$response = $account_manager->register('DAKIA', 'Franck', AccountManager::CIVILITE_MONSIEUR, '84497105', '52797005');
// Validation de compte avec le code OTP
$response = $account_manager->validation($code = '1GYY');
// Get balance
$response = $account_manager->balance($number = '49929598');

// Tax Payer Manager
$tax_payer_manager = new TaxPayerManager($authentication);
// Search tax payer
$response = $tax_payer_manager->search('code', 'Samer');
// Search tax payer municipalities
$response = $tax_payer_manager->municipalities($tax_payer_id = 1);
// Search tax payer activities
$response = $tax_payer_manager->activities($tax_payer_id = 1, $municipality_id = 1);
// Search tax payer taxes
$response = $tax_payer_manager->tax($tax_payer_id = 1, $activity_id = 1);

// Transaction Manager
$transaction_manager = new TransactionManager($authentication);
// Depot de fond
$transaction_manager->depositMoney($amount = "2547880", $number = "49929598");
// Retrait de fond
$transaction_manager->withdrawMoney($amount = "2547880", $number = "49929598");
// Validation de code
$transaction_manager->withdrawMoneyValidation($code = "2547880");