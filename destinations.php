<?php

session_start();

include_once('db/connect_db.php');

if (isset($_POST['redirect'])) {
	if ($_POST['redirect'] == "connexion") {
		header('Location: /connexion.php?next=/destinations.php?id='.$_GET['id']);
	} elseif ($_POST['redirect'] == "inscription") {
		header('Location: /inscription.php');
	}
}

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
		<link rel="stylesheet" type="text/css" href="assets/css/forms.css">
		<link rel="stylesheet" type="text/css" href="assets/css/carousel.css">
		<!-- //////////// -->
		<!-- FONTAWESOME -->
		<script src="https://kit.fontawesome.com/82664567ab.js" crossorigin="anonymous"></script>
		<!-- /////////// -->
	</head>
	<body>
		<!-- Barre de navigation -->
		<?php require_once('assets/php/navbar.php'); ?>
		<!-- /////////////////// -->
		<?php
		if (!isset($_GET['id']) OR empty($_GET['id'])) {
			if (isset($_GET['type']) AND !empty($_GET['type'])) {
		?>
		<section class="destinations" id="destinations" aria-label="Destinations mises en avant">
            <h3>Nos destinations</h3>
            <div class="cards" role="list">
				<?php
				$req_two_dests = $BDD->query('SELECT * FROM destinations WHERE types LIKE ?', ["%".$_GET['type']."%"]);
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
        <?php
        	} else {
        ?>
		<section class="destinations" id="destinations" aria-label="Destinations mises en avant">
            <h3>Nos destinations</h3>
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
        <?php
    		}
    	} else {
    	?>
		<section class="destinations" id="destinations" aria-label="Destination">
            <div class="cards" role="list">
				<?php
				$req_dest_id = $BDD->query('SELECT destinations.*, AVG(avis.score) AS moyenne_avis, COUNT(avis.id) AS nombre_avis FROM destinations LEFT JOIN avis ON destinations.id = avis.dest_id WHERE destinations.id=? GROUP BY destinations.id', [$_GET['id']]);
				foreach ($req_dest_id->fetchAll() as $dest) {
				?>
                <article class="card" role="listitem" tabindex="0">
                    <img src="<?= $dest['image']; ?>" alt="<?= $dest['image_alt']; ?>">
                    <div class="card-content">
                        <h4><?= $dest['country']; ?> | <?= $dest['title']; ?></h4>
                        <?php
                        if (isset($dest['moyenne_avis']) AND !empty($dest['moyenne_avis'])) {
                        	if ($dest['moyenne_avis'] < 0.25) {
                        		$stars = '<i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
                        	} elseif ($dest['moyenne_avis'] < 0.75) {
                        		$stars = '<i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
                        	} elseif ($dest['moyenne_avis'] < 1.25) {
                        		$stars = '<i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
                        	} elseif ($dest['moyenne_avis'] < 1.75) {
                        		$stars = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
                        	} elseif ($dest['moyenne_avis'] < 2.25) {
                        		$stars = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
                        	} elseif ($dest['moyenne_avis'] < 2.75) {
                        		$stars = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
                        	} elseif ($dest['moyenne_avis'] < 3.25) {
                        		$stars = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
                        	} elseif ($dest['moyenne_avis'] < 3.75) {
                        		$stars = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i>';
                        	} elseif ($dest['moyenne_avis'] < 4.25) {
                        		$stars = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>';
                        	} elseif ($dest['moyenne_avis'] < 4.75) {
                        		$stars = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>';
                        	} else {
                        		$stars = '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
                        	}
                        ?>
                        <p style="font-weight: 900;"><?= $stars; ?> (<?= $dest['nombre_avis']; ?> avis)</p>
                        <?php
                    	} else {
                        ?>
                        <p style="font-weight: 900;">Aucun avis pour le moment.</p>
                        <?php
                    	}
                        ?>
                    	<p><?= $dest['city']." [".$dest['zip_code']."], ".$dest['street_number']." ".$dest['street_name']; ?></p>
                        <p><?= $dest['description']; ?></p>
                        <div class="center">
                        	<?php
                        	if (isset($_SESSION['user_id']) AND !empty($_SESSION['user_id'])) {
                        	?>
							<form class="form" method="post">
								<div class="title-box">
									<h2>DONNEZ VOTRE AVIS</h2>
								</div>
								<?php
								$req_user_comment_exists = $BDD->query('SELECT * FROM avis WHERE user_id = ? AND dest_id = ?', [$_SESSION['user_id'], $_GET['id']]);
								if ($req_user_comment_exists->rowCount() == 0) {
								?>
								<div class="input-box">
									<label>Note :</label>
									<input type="number" min="0" max="5" name="score" required>
								</div>
								<div class="input-box">
									<label>Commentaire :</label>
									<textarea name="comment"></textarea>
								</div>
								<div class="submit-box">
									<button name="submit" value="send">Envoyer !</button>
								</div>
								<?php
								} else {
								?>
								<div class="input-box">
									<label class="error">Vous avez déjà posté un avis sur cette destination !</label>
								</div>
								<?php
								}
								?>
							</form>
							<?php
							} else {
							?>
							<form class="form" method="post">
								<div class="title-box">
									<h2>CONNECTEZ-VOUS POUR DONNER UN AVIS</h2>
								</div>
								<div class="input-box">
									<button name="redirect" value="connexion">Connexion</button>
								</div>
								<div class="input-box">
									<button name="redirect" value="inscription">Inscription</button>
								</div>
							</form>
							<?php
							}
							?>
	                    </div>
                    </div>
                </article>
                <?php
            	}
                ?>
            </div>
        </section>
        <?php
    	}
        if (isset($stars)) {
        ?>
		<section class="destinations" id="avisautres" aria-label="Avis vérifiés">
            <h3>Les avis</h3>
            <div class="cards" role="list">
                <article class="card" role="listitem" tabindex="0">
                	<div id="carousel">
						<div class="carousel-track">
							<?php
							$req_comments = $BDD->query('SELECT avis.score, utilisateurs.username FROM avis, utilisateurs WHERE avis.user_id = utilisateurs.id AND avis.dest_id = ? ORDER BY utilisateurs.id DESC LIMIT 10', [$_GET['id']]);
							foreach ($req_comments as $comment) {
							?>
							<div class="slide">
								<p class="slide-username"><?= $comment['username']; ?></p>
								<p class="slide-note"><?= $comment['score']; ?></p>
							</div>
							<?php

							?>
						</div>
						<button class="prev">&#10094;</button>
						<button class="next">&#10095;</button>
                	</div>
                </article>
            </div>
        </section>
        <?php
    	}
        ?>
		<section class="destinations" id="autresdestinations" aria-label="Autres destinations">
            <h3>Autres destinations</h3>
            <div class="cards" role="list">
				<?php
				$req_two_dests = $BDD->query('SELECT * FROM destinations WHERE id <> ? ORDER BY RAND() LIMIT 3', [$_GET['id']]);
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
    	<?php
    	}
        ?>
		<!-- Pied de page -->
		<?php require_once('assets/php/footer.php'); ?>
		<!-- //////////// -->
		<!-- JS SCRIPTS -->
		<script>
			const track = document.querySelector('.carousel-track');
			const slides = Array.from(track.children);
			const nextBtn = document.querySelector('.next');
			const prevBtn = document.querySelector('.prev');

			let index = 0;

			nextBtn.addEventListener('click', () => {
				index = (index + 1) % slides.length;
				updateCarousel();
			});

			prevBtn.addEventListener('click', () => {
				index = (index - 1 + slides.length) % slides.length;
				updateCarousel();
			});

			function updateCarousel() {
				const slideWidth = slides[0].getBoundingClientRect().width;
				track.style.transform = `translateX(-${slideWidth * index}px)`;
			}

		</script>
		<!-- ////////// -->
	</body>
</html>