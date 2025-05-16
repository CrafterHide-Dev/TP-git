<?php

session_start();

include_once('db/connect_db.php');

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<!-- Fichiers CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/general.css">
		<link rel="stylesheet" type="text/css" href="assets/css/navbar.css">
		<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
		<link rel="stylesheet" type="text/css" href="assets/css/forms.css">
		<!-- //////////// -->
	</head>
	<body>
		<!-- Barre de navigation -->
		<?php require_once('assets/php/navbar.php'); ?>
		<!-- /////////////////// -->

		<div class="center">
			<form class="form" method="post">
				<div class="title-box">
					<h2>INSCRIPTION</h2>
				</div>
				<div class="input-box">
					<label>Nom d'utlisateur :</label>
					<input type="text" name="username" required>
				</div>
				<div class="input-box">
					<label>Mot de passe :</label>
					<div class="inline">
						<input type="password" name="password" style="flex-grow: 1;" required>
					</div>
				</div>
				<div class="input-box">
					<label>Confirmer le mot de passe :</label>
					<input type="password" name="repassword" required>
				</div>
				<div class="submit-box">
					<button name="submit" value="connection">S'inscrire !</button>
				</div>
			</form>
		</div>

		<!-- Pied de page -->
		<?php require_once('assets/php/footer.php'); ?>
		<!-- //////////// -->
	</body>
</html>