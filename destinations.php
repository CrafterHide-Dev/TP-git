<?php

session_start();

include_once('db/connect_db.php');

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Destinations</title>
		<!-- Fichiers CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/general.css">
		<link rel="stylesheet" type="text/css" href="assets/css/navbar.css">
		<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
		<link rel="stylesheet" type="text/css" href="assets/css/destinations.css">
		<!-- //////////// -->
		<!-- FONTAWESOME -->
		<script src="https://kit.fontawesome.com/82664567ab.js" crossorigin="anonymous"></script>
		<!-- /////////// -->
	</head>
	<body>
		<!-- Barre de navigation -->
		<?php require_once('assets/php/navbar.php'); ?>
		<!-- /////////////////// -->
		<section class="destinations" id="destinations" aria-label="Destinations mises en avant">
            <h3>Destinations à découvrir</h3>
            <div class="cards" role="list">
				<?php
				$req_two_dests = $BDD->query('SELECT * FROM destinations');
				foreach ($req_two_dests->fetchAll() as $dest) {
				?>
                <article class="card" role="listitem" tabindex="0">
                    <img src="<?= $dest['image']; ?>" alt="<?= $dest['image_alt']; ?>">
                    <div class="card-content">
                        <h4><?= $dest['title']; ?></h4>
                        <p><?= $dest['description']; ?></p>
                        <a href="/destinations.php?id=<?= $dest['id']; ?>">Découvrir</a>
                    </div>
                </article>
                <?php
            	}
                ?>
            </div>
        </section>
		<!-- Pied de page -->
		<?php require_once('assets/php/footer.php'); ?>
		<!-- //////////// -->
	</body>
</html>