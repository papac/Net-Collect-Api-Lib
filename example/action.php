<?php

require __DIR__.'/../vendor/autoload.php';

use CNIT\NetCollect\Auth\Authentication;
use CNIT\NetCollect\Manager\AccountManager;
use CNIT\NetCollect\Manager\TaxPayerManager;
use CNIT\NetCollect\Manager\TransactionManager;

die($_GET['action']);

// Authentication
$key = "test";
$secret = "test";
$authentication = (new Authentication($key, $secret))->auth();

if ($_GET['action'] == 'create_account') {
	// Account Manager
	$account_manager = new AccountManager($authentication);
	// Register a new account
	$response = $account_manager->register(
		$_POST['Nom'],
		$_POST['Prenom'],
		(int) $_POST['IDCivilite'],
		$_POST['TelPrincipal'],
		$_POST['TelInitilisation']
	);
}

else if ($_GET['action'] == 'account_validation') {
	// Account Manager
	$account_manager = new AccountManager($authentication);
	// Validation de compte avec le code OTP
	$response = $account_manager->validation($_POST['code']);
}

else if ($_GET['action'] == 'get_balance') {
	// Account Manager
	$account_manager = new AccountManager($authentication);
	// Get balance
	$response = $account_manager->balance($number = '59367623');
}

else if ($_GET['action'] == 'get_contribuable') {
	// Tax Payer Manager
	$code = "BAE1501926181";
	$tax_payer_manager = new TaxPayerManager($authentication);
	// Search tax payer
	$response = $tax_payer_manager->search(1, $code);
}

else if ($_GET['action'] == 'get_municipalites') {
	$code = "BAE1501926181";
	$tax_payer_manager = new TaxPayerManager($authentication);
	// Search tax payer municipalities
	$response = $tax_payer_manager->municipalities($code);
}

else if ($_GET['action'] == 'get_activites') {
	$code = "BAE1501926181";
	$tax_payer_manager = new TaxPayerManager($authentication);
	// Search tax payer activities
	$response = $tax_payer_manager->activities($code, 24);
}

else if ($_GET['action'] == 'get_activite_tax') {
	$tax_payer_manager = new TaxPayerManager($authentication);
	// // Search tax payer taxes
	// 281474976745619
	$response = $tax_payer_manager->tax(7333, 7333);
}

else if ($_GET['action'] == 'pay_tax') {
	// Pay tax
	$response = $tax_payer_manager->payTax(49577, $number = 49929598);
}

else if ($_GET['action'] == 'cash_deposit') {
	// Transaction Manager
	$transaction_manager = new TransactionManager($authentication);
	// Depot de fond
	$response = $transaction_manager->depositMoney($amount = "5000", $number = "49929598");
}


else if ($_GET['action'] == 'withdraw_cash') {
	// Transaction Manager
	$transaction_manager = new TransactionManager($authentication);
	// Retrait de fond
	$response = $transaction_manager->withdrawMoney($amount = "3000", $number = "49929598");
}

else if ($_GET['action'] == 'withdraw_cash_validation') {
	// Transaction Manager
	$transaction_manager = new TransactionManager($authentication);
	// Validation de code
	$response = $transaction_manager->withdrawMoneyValidation($code = "B5Q8");
}

else {
	die(json_encode(['error' => true]));
}

die(json_encode($response));