<?php

session_start();

include_once('db/connect_db.php');

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$valid = true;

	if (isset($_POST['username']) && !empty($_POST['username'])) {

		if (strlen($_POST['username']) >= 3 && strlen($_POST['username']) < 16) {

			$req_user_verif = $BDD->query('SELECT id FROM utilisateurs WHERE username = "'.$_POST['username'].'"');
			foreach ($req_user_verif->fetchAll() as $user_verif) {
				$error['username'] = "Le nom d'utilisateur entré existe déjà !";
				$valid = false;
			}

		} else {

			$error['username'] = "Le nom d'utilisateur doit faire entre 3 et 16 caractères !";
			$valid = false;

		}

	} else {

		$error['username'] = "Veuillez remplir le nom d'utilisateur !";
		$valid = false;
	
	}

	if (isset($_POST['password']) && !empty($_POST['password'])) {

		if (strlen($_POST['password']) < 10 || !preg_match('/[A-Z]/', $_POST['password']) || !preg_match('/[a-z]/', $_POST['password']) || !preg_match('/[0-9]/', $_POST['password']) || !preg_match('/[\W_]/', $_POST['password'])) {

			$error['password'] = "Le mot de passe doit faire au moins 10 caractères avec au moins: 1 minuscule, 1 majuscule, 1 chiffre, 1 caractère spécial !";
			$valid = false;

		}

	} else {

		$error['password'] = "Veuillez remplir le nom d'utilisateur !";
		$valid = false;

	}

	if (isset($_POST['repassword']) && !empty($_POST['repassword'])) {

		if ($_POST['password'] != $_POST['repassword']) {

			$error['repassword'] = "Les mots de passe ne sont pas identiques !";
			$valid = false;

		}

	} else {

		$error['repassword'] = "Veuillez remplir la vérification de mot de passe !";
		$valid = false;

	}


	if ($valid) {

		$hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

		$req_insert_user = $BDD->prepare('INSERT INTO utilisateurs (username, password) VALUES (?, ?)', [$_POST['username'], $hashed_password]);

		$_SESSION['user_id'] = $BDD->getId();

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
		<title>Inscription</title>
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
					<h2>INSCRIPTION</h2>
				</div>
				<div class="input-box">
					<label>Nom d'utlisateur :</label>
					<input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : "" ?>" required>
				</div>
				<?php if (isset($error['username']) && !empty($error['username'])) { ?>
				<div class="input-box">
					<label class="error"><?= $error['username']; ?></label>
				</div>
				<?php } ?>
				<div class="input-box">
					<label>Mot de passe :</label>
					<div class="inline">
						<input id="checker-content" type="password" name="password" style="flex-grow: 1;" required>
						<div id="password-checker"></div>
					</div>
				</div>
				<?php if (isset($error['password']) && !empty($error['password'])) { ?>
				<div class="input-box">
					<label class="error"><?= $error['password']; ?></label>
				</div>
				<?php } ?>
				<div class="input-box">
					<label>Confirmer le mot de passe :</label>
					<input type="password" name="repassword" required>
				</div>
				<?php if (isset($error['repassword']) && !empty($error['repassword'])) { ?>
				<div class="input-box">
					<label class="error"><?= $error['repassword']; ?></label>
				</div>
				<?php } ?>
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