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
		<div class="col-sm-offset-2 col-sm-8">
			<form>
				<fieldset>
					<legend>Recherches</legend>
					<div class="form-group">
						<label for="exampleInputEmail1">Entrer un chiffre</label>
						<input type="text" placeholder="Un index" name="search" class="form-control">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Séléctionnez un mode</label>
						<select class="form-control" name="search_code">
							<option value="1">N° de carte de contribuable</option>
							<option value="2">N° de téléphone du contribuable</option>
						</select>
					</div>
					<div class="form-group form-check">
						<button type="submit" class="btn btn-primary">Recherchez</button>
					</div>
				</fieldset>
			</form>
		</div>

		<div class="col-sm-offset-2 col-sm-8">
			<div>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Communes</a></li>
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Activités</a></li>
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						
					</div>
					<div role="tabpanel" class="tab-pane" id="profile">
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>