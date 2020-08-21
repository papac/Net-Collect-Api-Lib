<?php

require __DIR__.'/../vendor/autoload.php';

use CNIT\NetCollect\Manager\AccountManager;

if (isset($_GET['action']) && $_GET['action'] == 'get_balance') {
	$authentication = require __DIR__.'/inc/auth.php';
	// Account Manager
	$account_manager = new AccountManager($authentication);
	// Get balance
	$response = (array) $account_manager->balance($_POST['TelPrincipal']);
	$solde = 0;

	foreach($response['TabSolde'] as $tabSolde) {
		$solde += $tabSolde['nSolde'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Net-Collect</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
	<?php include __DIR__.'/inc/navbar.php'; ?>
	<div class="container">
		<div class="col-sm-offset-4 col-sm-4" style="margin-top: 50px">
			<form action="?action=get_balance" method="post">
				<fieldset>
					<legend>Affichez votre balance</legend>
					<div class="form-group">
						<label for="exampleInputEmail1">Entrer votre numéro de téléphone</label>
						<input type="text" placeholder="Entrer votre numéro de téléphone" name="TelPrincipal" value="<?= $_POST['TelPrincipal'] ?? '' ?>" class="form-control">
					</div>
					<div class="form-group form-check">
						<button type="submit">Vérifiez</button>
					</div>
				</fieldset>
				<?php if (isset($solde)): ?>
				<div class="alert alert-info">
					<h2>Solde: <?= $solde ?> FCFA</h2>
				</div>
				<?php endif; ?>
			</form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>