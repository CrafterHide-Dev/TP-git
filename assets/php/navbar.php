<nav id="navbar">

	<div class="navbox">
		<a class="navlink" href="/index.php">Accueil</a>
		<a class="navlink" href="/destinations.php">Destinations</a>
		<a class="navlink" href="/classement.php">Classement</a>
	</div>

	<div class="navbox">
		<?php
		if (isset($_SESSION['user_id']) AND !empty($_SESSION['user_id'])) {
		?>
		<a class="navuser" href="/moncompte.php"><?= isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "Mon compte" ?></a>
		<a class="navdisconnect" href="/deconnexion.php"><i class="fa-solid fa-user-lock"></i></a>
		<?php
		} else {
		?>
		<a class="navlink" href="/connexion.php">Connexion</a>
		<a class="navlink" href="/inscription.php">Inscription</a>
		<?php
		}
		?>
	</div>

</nav>