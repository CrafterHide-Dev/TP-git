<?php

session_start();

include_once('db/connect_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$username = "admin";
		$password = "1111";
		
		if ($_POST["username"] == $username && $_POST["password"] == $password) {
			$_SESSION["login"] = true;
			$_SESSION["username"] = $username;
			header("Location: index.php");
			exit;
		} else {
			$error = "Les identifiants sont incorrects.";
		}
	} else {
		$error = "Veuillez remplir tous les champs !";
	}
}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Connexion</title>
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
					<h2>CONNEXION</h2>
				</div>
				<div class="input-box">
					<label>Identifiant :</label>
					<input type="text" name="username" required>
				</div>
				<div class="input-box">
					<label>Mot de passe :</label>
					<input type="password" name="password" required>
				</div>
				<?php if (isset($error) && !empty($error)) { ?>
				<div class="input-box">
					<label class="error"><?= $error; ?></label>
				</div>
				<?php } ?>
				<div class="submit-box">
					<button name="submit" value="connection">Se connecter !</button>
				</div>
			</form>
		</div>


		<!-- Pied de page -->
		<?php require_once('assets/php/footer.php'); ?>
		<!-- //////////// -->

	</body>
</html>

