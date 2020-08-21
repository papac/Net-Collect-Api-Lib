<?php

require __DIR__.'/../vendor/autoload.php';

use CNIT\NetCollect\Manager\AccountManager;

$error = false;

$response = [];

if (!isset($_GET['action'])) {
	$_GET['action'] = false;
}

if (!empty($_POST) && $_GET['action'] == 'create_account') {
	$authentication = require __DIR__.'/inc/auth.php';
	// Account Manager
	$account_manager = new AccountManager($authentication);
	// Register a new account
	try {
		$response = $account_manager->register(
			$_POST['Nom'],
			$_POST['Prenom'],
			(int) $_POST['IDCivilite'],
			$_POST['TelPrincipal'],
			$_POST['TelInitilisation']
		);
		$account_validation = true;
	} catch (\Exception $e) {
		$error = $e->getMessage();
	}
}

else if ($_GET['action'] == 'account_validation') {
	$authentication = require __DIR__.'/inc/auth.php';
	// Account Manager
	$account_manager = new AccountManager($authentication);
	// Validation de compte avec le code OTP
	$response = $account_manager->validation($_POST['codeTransaction']);
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
		<div class="col-sm-offset-4 col-sm-4" style="margin-top: 50px; margin-bottom: 150px">
			<?php if ($error !== false): ?>
			<div class="alert alert-danger">
				<?= $error ?>
			</div>
			<?php endif; ?>
			<?php if (isset($response['nCode']) && $response['nCode'] == 200): ?>
				<div class="alert alert-success">
					<?= $response['sContenu'] ?>
				</div>
				<?php if (isset($account_validation)): ?>
					<div class="form-group text-center form-check">
						<a href="#" class="btn btn-success" data-target="#ModalvalidationOTP" data-toggle="modal">Cliquez ici pour valider la transaction</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<form action="?action=create_account" method="post">
				<fieldset>
					<legend>Création de compte</legend>
					<div class="form-group">
						<label for="nom">Nom</label>
						<input type="text" placeholder="Nom" value="<?= $_POST['Nom'] ?? '' ?>" name="Nom" class="form-control">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Prénom</label>
						<input type="text" placeholder="Prenom" value="<?= $_POST['Prenom'] ?? '' ?>" name="Prenom" class="form-control">
					</div>
					<div class="form-group">
						<label>Civilité</label>
						<select class="form-control" name="IDCivilite">
							<option value="1">Monsieur</option>
							<option value="2">Madame</option>
							<option value="3">Mademoiselle</option>
						</select>					
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Téléphone principal</label>
						<input type="text" name="TelPrincipal" value="<?= $_POST['TelPrincipal'] ?? '' ?>" placeholder="Téléphone principal" class="form-control">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Téléphone de sécours</label>
						<input type="text" name="TelInitilisation" value="<?= $_POST['TelInitilisation'] ?? '' ?>" placeholder="Téléphone de sécours" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Enrégister</button>
				</fieldset>
			</form>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="ModalvalidationOTP">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Validation OTP</h4>
				</div>
				<form action="?action=account_validation" method="post">
					<div class="modal-body">
						<p>Entrez votre code OTP</p>
						<div class="form-group">
							<input type="text" placeholder="Entrez le code OTP" name="codeTransaction" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
						<button type="submit" class="btn btn-primary">Effectuer le retrait</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>