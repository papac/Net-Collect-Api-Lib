<?php

require __DIR__.'/../vendor/autoload.php';

use CNIT\NetCollect\Manager\TransactionManager;

$response = [];

if (!empty($_POST) && $_GET['action'] == 'cash_deposit') {
	$authentication = require __DIR__.'/inc/auth.php';
	// Transaction Manager
	$transaction_manager = new TransactionManager($authentication);
	// Depot de fond
	$response = $transaction_manager->depositMoney((int) $_POST['montant'], $_POST['TelPrincipal']);
}

else if (!empty($_POST) && $_GET['action'] == 'withdraw_cash') {
	$authentication = require __DIR__.'/inc/auth.php';
	// Transaction Manager
	$transaction_manager = new TransactionManager($authentication);
	// Retrait de fond
	$response = $transaction_manager->withdrawMoney($_POST['montant'], $_POST['TelPrincipal']);

	$withdraw_cash_validation = true;
}

else if (!empty($_POST) && $_GET['action'] == 'withdraw_cash_validation') {
	$authentication = require __DIR__.'/inc/auth.php';
	// Transaction Manager
	$transaction_manager = new TransactionManager($authentication);
	// Validation de code
	$response = $transaction_manager->withdrawMoneyValidation($_POST['codeTransaction']);

	$withdraw_cash_validated = true;
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
	<div class="container" style="margin-top: 50px">
		<div class="col-sm-offset-2 col-sm-4">
			<form action="?action=cash_deposit" method="post">
				<fieldset>
					<legend>Dépot</legend>
					<div class="form-group">
						<label>Entrer votre numéro de téléphone</label>
						<input type="text" placeholder="Votre numéro de téléphone" name="TelPrincipal" class="form-control">
					</div>
					<div class="form-group">
						<label>Montant</label>
						<input type="text" placeholder="Le montant" name="montant" class="form-control">
					</div>
					<div class="form-group form-check">
						<button class="btn btn-primary" type="submit">Confirmer</button>
					</div>
				</fieldset>
				<?php if ($_GET['action'] == 'cash_deposit'): ?>
					<div class="alert alert-info">
						<?= $response['cleretour'] ?>
					</div>
				<?php endif; ?>
			</form>
		</div>

		<div class="col-sm-4">
			<form action="?action=withdraw_cash" method="post">
				<fieldset>
					<legend>Retrait</legend>
					<div class="form-group">
						<label>Entrer votre numéro de téléphone</label>
						<input type="text" placeholder="Votre numéro de téléphone" name="TelPrincipal" class="form-control">
					</div>
					<div class="form-group">
						<label>Montant</label>
						<input type="text" placeholder="Le montant" name="montant" class="form-control">
					</div>
					<div class="form-group form-check">
						<button class="btn btn-primary" type="submit" >Confirmer</button>
					</div>
					<?php if (isset($withdraw_cash_validation)): ?>
						<?php if ($_GET['action'] == 'withdraw_cash'): ?>
							<div class="alert alert-info">
								<?= $response['cleretour'] ?>
							</div>
						<?php endif; ?>
						<div class="form-group form-check">
							<a href="#" class="btn btn-success" data-target="#ModalvalidationOTP" data-toggle="modal">Cliquez ici pour valider la transaction</a>
						</div>
					<?php endif; ?>
					<?php if (isset($withdraw_cash_validated)): ?>
						<?php if ($_GET['action'] == 'withdraw_cash_validation'): ?>
							<?php if ($response['codeEtat'] == 200): ?>
								<div class="alert alert-success">
									<?= $response['messageEtat'] ?> sur le compte de <?= $response['nomPrenomClient'] ?>
								</div>
							<?php else: ?>
								<div class="alert alert-danger"><?= $response['messageEtat'] ?></div>
							<?php endif; ?>
						<?php endif; ?>
						<div class="form-group form-check">
							<a href="#" class="btn btn-success" data-target="#ModalvalidationOTP" data-toggle="modal">Cliquez ici pour valider la transaction</a>
						</div>
					<?php endif; ?>
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
				<form action="?action=withdraw_cash_validation" method="post">
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