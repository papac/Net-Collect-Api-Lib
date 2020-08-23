<?php

require __DIR__.'/../vendor/autoload.php';

use CNIT\NetCollect\Manager\TaxPayerManager;

$response = [];
$municipalities = [];
$activities = [];

if (!empty($_GET) && $_GET['action'] == 'get_contribuable') {
	$authentication = require __DIR__.'/inc/auth.php';
	// Tax Payer Manager
	$tax_payer_manager = new TaxPayerManager($authentication);
	// Search tax payer
	$response = $tax_payer_manager->search($_GET['search_code'], $_GET['search']);
	
	if (isset($response['nCodeEtat']) && $response['nCodeEtat'] == 200) {
		// Search tax payer municipalities
		$municipalities = $tax_payer_manager->municipalities($response['sNumcarteContrCarte']);
		// Search tax payer activities
		foreach($municipalities['tabListeCommune'] as $key => $commune) {
			$municipalities['tabListeCommune'][$key]['activities'] = $tax_payer_manager->activities($response['sNumcarteContrCarte'], $commune['nIdcommune']);
		}
	}
}

else if (!empty($_GET) && $_GET['action'] == 'get_activite_tax') {
	$authentication = require __DIR__.'/inc/auth.php';
	// Tax Payer Manager
	$tax_payer_manager = new TaxPayerManager($authentication);
	// Search tax payer
	$taxes = $tax_payer_manager->tax(7333, 7333);
	header('Content-Type: application/json');
	die(json_encode($taxes));
}

else if (!empty($_GET) && $_GET['action'] == 'pay_tax') {
	$authentication = require __DIR__.'/inc/auth.php';
	// Tax Payer Manager
	$tax_payer_manager = new TaxPayerManager($authentication);
	// Pay tax
	$response = $tax_payer_manager->payTax($_GET['tax_id'], $_GET['number']);
	header('Content-Type: application/json');
	die(json_encode($response));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Net-Collect</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css"/>
</head>
<body>
	<?php include __DIR__.'/inc/navbar.php'; ?>
	<div class="container" style="margin-top: 50px; margin-bottom: 150px">
		<div class="col-sm-offset-2 col-sm-8">
			<?php if (isset($response['nCodeEtat']) && $response['nCodeEtat'] == 404): ?>
				<div class="alert alert-danger">
					<?= $response['sResulat'] ?>
				</div>
			<?php endif; ?>
			<form action="?action=get_contribuable" method="get">
				<fieldset>
					<legend>Recherches</legend>
					<input type="hidden" name="action" value="get_contribuable">
					<div class="form-group">
						<label for="exampleInputEmail1">Entrer un chiffre</label>
						<input type="text" placeholder="Un index" name="search" value="<?= $_GET['search'] ?? '' ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Séléctionnez un mode</label>
						<select class="form-control" name="search_code" required>
							<option value="1" <?= isset($_GET['search_code']) && $_GET['search_code'] == 1 ? 'selected' : '' ?>>N° de carte de contribuable</option>
							<option value="2" <?= isset($_GET['search_code']) && $_GET['search_code'] == 1 ? 'selected' : '' ?>>N° de téléphone du contribuable</option>
						</select>
					</div>
					<div class="form-group form-check">
						<button type="submit" class="btn btn-primary">Recherchez</button>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="col-sm-offset-2 col-sm-8">
		<?php if (isset($response['nCodeEtat']) && $response['nCodeEtat'] == 200): ?>
			<div class="alert alert-info">
				<b>Nom:</b> <?= $response['sNomContrCarte'] ?><br>
				<b>Carte:</b> <?= $response['sNumcarteContrCarte'] ?><br>
				<b>Sys_Id:</b> <?= $response['nIdContrCarte'] ?><br>
				<b>Date Naissance:</b> <?= $response['sDateNaissanceContrcarte'] ?><br>
				<b>Téléphone:</b> <?= $response['sTelPrincipal'] ?><br>
			</div>
		<?php endif; ?>
		</div>
		<?php if (isset($municipalities['tabListeCommune'])): ?>
			<div class="col-sm-offset-2 col-sm-8">
				<h4>Communes</h4>
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php foreach($municipalities['tabListeCommune'] as $key => $municipality): ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion-<?= $key ?>" aria-controls="accordion-<?= $key ?>"><?= $municipality['sNomCommune'] ?></a>
							</h4>
						</div>
						<div id="accordion-<?= $key ?>" class="panel-collapse collapse <?= $key == 0 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<table class="table table-bordered table-striped">
									<tr>
										<th>Id</th>
										<th>Nom Activité</th>
										<th>Situation Géographique</th>
										<th>Type</th>
										<th>#</th>
									</tr>
									<?php foreach($municipality['activities']['listeActivi'] as $activity): ?>
										<tr>
											<td><?= $activity['nIdActivite'] ?></td>
											<td><?= $activity['sNomActivite'] ?></td>
											<td><?= $activity['sSituationGeo'] ?></td>
											<td><?= $activity['sTypeActivite'] ?></td>
											<td><a href="#" class="show-tax" data-target="#modalTaxes" data-url="contribuable.php?action=get_activite_tax" data-toggle="modal">Affichez les Taxes</a></td>
										</tr>
									<?php endforeach; ?>
								</table>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modalTaxes">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Taxes</h4>
				</div>
				<div class="modal-body">
					<table id="taxLists" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Id Liaison</th>
								<th>Libellé</th>
								<th>Id Activité</th>
								<th>Année d'Execution</th>
								<th>Montant</th>
								<th>Périodicité</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody id="tabListeTaxe">

						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</div>
	</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$('.show-tax').click(function () {
			let url = $(this).data('url');
			$('#tabListeTaxe').html('<tr><td colspan="7" class="text-center"><b>Chargement...</b></td></tr>');
			$.get(url, function(data) {
				let html = '';
				$('#tabListeTaxe').html('');
				for(let i = 0; i < data.tabListeTaxe.length; i++) {
					let taxe = data.tabListeTaxe[i];
					let temp = `<tr><td>${taxe.nIdLiaison}</td>
					<td>${taxe.sLibelleTaxe}</td>
					<td>${taxe.nIdActivite}</td>
					<td>${taxe.nAnneeExecution}</td>
					<td>${taxe.nMontantTaxe}</td>
					<td>${taxe.sPeriodicite}</td><td><a href="#" onclick="payTax(${taxe.nIdLiaison})">Payer</a></td></tr>`;
					html += temp;
				}

				if (html.length > 0) {
					$('#tabListeTaxe').html(html);
				}
			});
		});

		function payTax(tax_id) {
			let number = prompt("Entrez un numéro TrésorMoney: ");
			let url = `contribuable.php?action=pay_tax&number=${number}&tax_id=${tax_id}`;
			$.get(url, function(data) {
				if (data.codeEat == 200) {
					alert('Reference: ' + data.reference + ' - paiement du mois: ' + data.periodePaye);
				} else {
					alert(data.response);
				}
			});
		}
	</script>
</body>
</html>