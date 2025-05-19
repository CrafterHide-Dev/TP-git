<?php

session_start();

include_once('db/connect_db.php');

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Classement</title>
		<!-- Fichiers CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/general.css">
		<link rel="stylesheet" type="text/css" href="assets/css/navbar.css">
		<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
		<!-- //////////// -->
		<!-- FONTAWESOME -->
		<script src="https://kit.fontawesome.com/82664567ab.js" crossorigin="anonymous"></script>
		<!-- /////////// -->
	</head>
	<body>
		<!-- Barre de navigation -->
		<?php require_once('assets/php/navbar.php'); ?>
		<!-- /////////////////// -->

		<!-- Pied de page -->
		<?php require_once('assets/php/footer.php'); ?>
		<!-- //////////// -->
	</body>
</html>