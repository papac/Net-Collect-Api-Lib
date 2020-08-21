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
			<form action="action.php?action=cash_deposit" method="post">
				<fieldset>
					<legend>Dépot</legend>
					<div class="form-group">
						<label>Entrer votre numéro de téléphone</label>
						<input type="text" name="TelPrincipal" class="form-control">
					</div>
					<div class="form-group">
						<label>Montant</label>
						<input type="text" name="montant" class="form-control">
					</div>
					<div class="form-group form-check">
						<button type="submit">Confirmer</button>
					</div>
				</fieldset>
			</form>
		</div>

		<div class="col-sm-4">
			<form action="action.php?action=cash_deposit">
				<fieldset>
					<legend>Retrait</legend>
					<div class="form-group">
						<label>Entrer votre numéro de téléphone</label>
						<input type="text" name="TelPrincipal" class="form-control">
					</div>
					<div class="form-group">
						<label>Montant</label>
						<input type="text" name="montant" class="form-control">
					</div>
					<div class="form-group form-check">
						<button type="submit" data-target="#ModalvalidationOTP" data-toggle="modal">Confirmer</button>
					</div>
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
				<div class="modal-body">
					<p>Entrez votre code OTP</p>
					<form action="action.php?action">
						<div class="form-group">
							<label for="exampleInputEmail1">Entrer votre numéro de téléphone</label>
							<input type="text" name="TelPrincipal" class="form-control">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>