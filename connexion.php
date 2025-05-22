<?php

session_start();

include_once('db/connect_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$valid = true;
	$pass_verified = false;

	if (!isset($_POST['username']) || empty($_POST['username'])) {
		$error['username'] = "Veuillez remplir le nom d'utilisateur !";
		$valid = false;
	}

	if (isset($_POST['password']) && !empty($_POST['password'])) {

		if ($valid) {

			$req_account_verify = $BDD->query('SELECT id,password FROM utilisateurs WHERE username = "'.$_POST['username'].'"');

			foreach ($req_account_verify->fetchAll() as $verify) {
				$id = $verify['id'];
				if (password_verify($_POST['password'], $verify['password'])) {
					$pass_verified = true;
				}
			}

		}

	} else {
		$error['username'] = "Veuillez remplir le mot de passe !";
		$valid = false;
	}

	if ($pass_verified) {
		$_SESSION['user_id'] = $id;
		$_SESSION['user_name'] = $_POST['username'];
		header('Location: /');
		exit;
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
		<!-- FONTAWESOME -->
		<script src="https://kit.fontawesome.com/82664567ab.js" crossorigin="anonymous"></script>
		<!-- /////////// -->
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
					<input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : "" ?>" required>
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

