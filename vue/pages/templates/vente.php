<?php
	session_start();
	include '../structure/inc.header.php';
	include '../../../modele/modele.php';
	include '../../../controleur/controleur.php';
?>

<body>
	<main>
		<!--Header-->
		<header class="header-height">
			<div class="header-top">
				<a href="../index.php" title="Accueil"><img src="/demos/beeyondauto/vue/assets/images/logos/logo.png" alt="Logo"></a>
				<div class="menu">
					<nav>
						<ul>
							<li><a href="../index.php">Accueil</a></li>
							<li><a href="achat.php">Acheter</a></li>
							<li><a href="vente.php" class="active">Vendre</a></li>
							<li><a href="location.php">Louer</a></li>
						</ul>
					</nav>
					<div id="header-top-right">
					<?php if($_SESSION && count($_SESSION) && array_key_exists('utilisateurs', $_SESSION) && !empty($_SESSION['utilisateurs'])) :  ?>
						<!-- Si l'utilisateur est connecté -->
						<a href="/demos/beeyondauto/vue/pages/templates/mon-compte.php" title="Mon panier" class="btn"><i class="cp cp-shopping-cart-o"></i></a>
						<a href="mon-compte.php" title="Mon compte" class="btn btn-outline" data="Mon compte"><i class="fa-regular fa-user"></i></a>
					<?php else : ?>
						<!-- Si l'utilisateur n'est pas connecté -->
						<a href="connexion.php" title="Se connecter" class="btn btn-outline" data="Se connecter"><i class="fa-regular fa-user"></i></a>
					<?php endif; ?>
					</div>
				</div>
				<div id="hamburger-menu">
					<span id="line-1"></span>
					<span id="line-2"></span>
					<span id="line-3"></span>
				</div>
			</div>
			<div id="header-img-container">
				<img class="header-img-sm" src="/demos/beeyondauto/vue/assets/images/header-img3.webp" alt="Intérieur de voiture">
				<div>
					<h1 class="to-right">Vendre son véhicule</h1>
					<p class="desc section-desc">Des démarches simplifiées et des temps d'attente réduits</p>
				</div>
			</div>
		</header>
		<!--Form-->
		<?php if($_SESSION && count($_SESSION) && array_key_exists('utilisateurs', $_SESSION) && !empty($_SESSION['utilisateurs'])) :  ?>
		<div class="content content-vente">
			<div class="left-content">
				<p class="desc section-desc">/ Commencez par remplir notre formulaire</p>
				<h2 class="to-left">Quel véhicule souhaitez-vous vendre ?</h2>
			</div>
			<form id="form_vente" action="" method="post" autocomplete="off" class="form-vente" >
				<div class="form-inline">
					<fieldset class="category">
						<legend><i class="cp cp-tags"></i>Marque</legend>
						<label for="brand">Marque</label>
						<input type="text" id="brand" name="marque" minlength="2" maxlength="20" placeholder="exemple : Audi" required>
					</fieldset>
					<fieldset class="category">
						<legend><i class="cp cp-car"></i>Modèle</legend>
						<label for="model">Modèle</label>
						<input type="text" id="model" name="model" minlength="2" maxlength="20" placeholder="exemple : A1" required>
					</fieldset>
				</div>
				<div class="form-inline">
					<fieldset class="category">
						<legend><i class="cp cp-calendar"></i>Année</legend>
						<label for="year" >Année</label>
						<input type="number" name="annedesortie" id="year" min="1900" max="2023" step="1" value="2016" required>
					</fieldset>
					<fieldset class="category">
						<legend><i class="cp cp-info-alt"></i>Type</legend>
						<label for="type">Type</label>
						<select name="type" id="type" required>
							<option value="BERLINE">Berline</option>
							<option value="BREAK">Break</option>
							<option value="CABRIOLET">Cabriolet</option>
							<option value="CITADINE">Citadine</option>
							<option value="COUPE">Coupé</option>
							<option value="JUMPER">Jumper</option>
							<option value="LUXE">Luxe</option>	
							<option value="MONOSPACE">Monospace</option>
							<option value="RANGER">Ranger</option>
							<option value="SOCIETE">Société</option>
							<option value="SUV">SUV</option>
							<option value="UTILITAIRES">Utilitaire</option>
						</select>
					</fieldset>
					<fieldset class="category">
						<legend><i class="cp cp-wrench"></i>Moteur</legend>
						<label for="powertrain">Moteur</label>
						<select name="moteur" id="powertrain" required>
							<option value="DIESEL">Diesel</option>
							<option value="ELECTRIQUE">Électrique</option>
							<option value="ESSENCE">Essence</option>
							<option value="HYBRIDE">Hybride</option>
						</select>
					</fieldset>
				</div>
				<div class="form-inline">
					<fieldset class="category">
						<legend><i class="cp cp-watch"></i>Puissance</legend>
						<label for="gearbox">Puissance (ch)</label>
						<input type="number" id="gearbox" name="puissance_ch" min="5" value="100" required>
					</fieldset>
					<fieldset class="category">
						<legend><i class="cp cp-enter"></i>Portes</legend>
						<label for="doors">Portes</label>
						<input type="number" id="doors" name="nombredeportes" min="2" max="5" value="5" required>
					</fieldset>
					<fieldset class="category">
						<legend><i class="cp cp-group"></i>Places</legend>
						<label for="seats">Places</label>
						<input type="number" id="seats" name="nombredeplaces" min="1" max="9" value="5" required>
					</fieldset>
					<fieldset class="category">
						<legend><i class="cp cp-sale"></i>Prix</legend>
						<label for="price">Prix proposé</label>
						<input type="number" id="price" name="prix_vente" min="1" max="10000000" placeholder="€" required>
					</fieldset>
				</div>
				<div class="btn btn-outline" data="Envoyer ma demande">
					<input name="btn" type="submit" value="">
					<i class="fa-solid fa-arrow-right-long"></i>
				</div>
				<!--Form feedback messages-->
				<div class="feedback-msg validate" style="display: none;">
					<i class="cp cp-check-mark"></i>
					Votre demande sera traitée dans les plus brefs délais. Nous vous contacterons pour plus d'informations.
				</div>
				<div class="feedback-msg error" style="display: none;">
					<i class="cp cp-cross"></i>
					Message d'erreur ici
				</div>
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
					// Process form submission here
					// Check for errors
					$has_error = true; // Change this based on your error-checking logic
					
					if (!$has_error) {
						// Error, return error message
						echo '<script>document.querySelector(".feedback-msg.error").style.display = "block";</script>';
					} else {
							// No error, return success message
						echo '<script>document.querySelector(".feedback-msg.validate").style.display = "block";</script>';
						
					}
				}
				?>
			</form>
		</div>
		<?php else : ?>
		<div class="content content-acc content-acc-signed-out">
			<h2 class="to-left title-connect"><a href="connexion.php">Connectez-vous</a> pour vendre votre véhicule</h2>
		</div>
		<?php endif; ?>
	</main>
<?php include '../structure/inc.footer.php'; ?>