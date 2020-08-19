<?php

require __DIR__.'/vendor/autoload.php';

use CNIT\NetCollect\Auth\Authentication;
use CNIT\NetCollect\Manager\AccountManager;
use CNIT\NetCollect\Manager\TaxPayerManager;
use CNIT\NetCollect\Manager\TransactionManager;

// Authentication
$key = "test";
$secret = "test";
$authentication = (new Authentication($key, $secret))->auth();

// // Account Manager
// $account_manager = new AccountManager($authentication);
// // Register a new account
// $response = $account_manager->register('DAKIA', 'Franck', AccountManager::CIVILITE_MONSIEUR, '49929598', '52797005');
// // Validation de compte avec le code OTP
// $response = $account_manager->validation($code = '1GYY');
// // // Get balance
// $response = $account_manager->balance($number = '59367623');

// Tax Payer Manager
$code = "BAE1501926181";
$tax_payer_manager = new TaxPayerManager($authentication);
// Search tax payer
// $response = $tax_payer_manager->search(1, $code);
// // // Search tax payer municipalities
// $response = $tax_payer_manager->municipalities($code);
// // // Search tax payer activities
// $response = $tax_payer_manager->activities($code, 24);
// // // Search tax payer taxes
// // 281474976745619
// $response = $tax_payer_manager->tax(7333, 7333);
// // Pay tax
$response = $tax_payer_manager->payTax(49577, $number = 49929598);

// // Transaction Manager
// $transaction_manager = new TransactionManager($authentication);
// // Depot de fond
// $transaction_manager->depositMoney($amount = "5000", $number = "49929598");
// // Retrait de fond
// $transaction_manager->withdrawMoney($amount = "3000", $number = "49929598");
// // Validation de code
// $transaction_manager->withdrawMoneyValidation($code = "B5Q8");