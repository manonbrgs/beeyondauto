<?php
	session_start();
	require_once '../structure/inc.header.php';
	require_once '../../../modele/modele.php';
	require_once '../../../controleur/controleur.php';
?>

<body>
	<!--Header-->
	<main>
		<header class="header-height">
			<div class="header-top">
				<a href="../index.php" title="Accueil"><img src="/demos/beeyondauto/vue/assets/images/logos/logo.png" alt="Logo"></a>
				<div class="menu">
					<nav>
						<ul>
							<li><a href="../index.php">Accueil</a></li>
							<li><a href="achat.php" class="active">Acheter</a></li>
							<li><a href="vente.php">Vendre</a></li>
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
					<h1 class="to-right">Acheter un véhicule</h1>
					<p class="desc section-desc">Neuf ou d'occasion</p>
				</div>
			</div>
		</header>
		<div class="content">
			<!--Sidebar-->
			<form method="" action="" onchange ="facettesAchat(this.value)" class="sidebar">
				<input type="text" name="search_text" id="search_text" placeholder="Rechercher un véhicule" class="form-control form-black" />
				<fieldset class="category">
					<legend><i class="cp cp-new"></i>État</legend>
					<ul>
						<li><input type="radio" name="choice_etat[]" id="choice_etat-1" value="" checked><label for="choice_etat-1">TOUS</label></li>
						<?php $i = 2; foreach($_SESSION['achat_etat'] as $requete){ ?>
						<li><input type="radio" name="choice_etat[]" id="choice_etat<?php echo $i; ?>" value="<?php echo $requete; ?>"><label for="choice_etat-<?php echo $i; ?>"><?php echo $requete; ?></label></li>
						<?php $i++; } ?>
					</ul>
				</fieldset>
				<fieldset class="category">
					<legend><i class="cp cp-tags"></i>Marque</legend>
					<ul>
						<li><input type="radio" name="choice_marque[]" id="choice_marque-1" value="" checked><label for="choice_marque-1">TOUTES</label></li>
						<?php $i = 2; foreach($_SESSION['achat_marque'] as $requete){ ?>
						<li><input type="radio" name="choice_marque[]" id="choice_marque<?php echo $i; ?>" value="<?php echo $requete; ?>"><label for="choice_marque-<?php echo $i; ?>"><?php echo $requete. '<br />'; ?></label></li>
						<?php $i++; } ?>
					</ul>
				</fieldset>
				<fieldset class="category">
					<legend><i class="cp cp-car"></i>Type</legend>
					<ul>
						<li><input type="radio" name="choice_type[]" id="choice_type-1" value="" checked><label for="choice_type-1">TOUS</label></li>
						<?php $i = 2; foreach($_SESSION['achat_type'] as $requete){ ?>
						<li><input type="radio" name="choice_type[]" id="choice_type-<?php echo $i; ?>" value="<?php echo $requete; ?>"><label for="choice_type-<?php echo $i; ?>"><?php echo $requete. '<br />'; ?></label></li>
						<?php $i++; } ?>
					</ul>
				</fieldset>
				<fieldset class="category">
					<legend><i class="cp cp-car"></i>Moteur</legend>
					<ul>
						<li><input type="radio" name="choice_moteur[]" id="choice_moteur-1" value="" checked><label for="choice_type-1">TOUS</label></li>
						<?php $i = 2; foreach($_SESSION['achat_moteur'] as $requete){ ?>
						<li><input type="radio" name="choice_moteur[]" id="choice_moteur-<?php echo $i; ?>" value="<?php echo $requete; ?>"><label for="choice_type-<?php echo $i; ?>"><?php echo $requete. '<br />'; ?></label></li>
						<?php $i++; } ?>
					</ul>
				</fieldset>
				<fieldset class="category">
					<legend><i class="cp cp-car"></i>Boîte à vitesse</legend>
					<ul>
						<li><input type="radio" name="choice_boitedevitesse[]" id="choice_boitedevitesse-1" value="" checked><label for="choice_type-1">TOUTES</label></li>
						<?php $i = 2; foreach($_SESSION['achat_boitedevitesse'] as $requete){ ?>
						<li><input type="radio" name="choice_boitedevitesse[]" id="choice_boitedevitesse-<?php echo $i; ?>" value="<?php echo $requete; ?>"><label for="choice_type-<?php echo $i; ?>"><?php echo $requete. '<br />'; ?></label></li>
						<?php $i++; } ?>
					</ul>
				</fieldset>
				<fieldset class="category">
					<legend><i class="cp cp-user"></i>Capacité</legend>
					<ul>
						<li><input type="radio" name="choice_place[]" id="choice_place-1" value="" checked><label for="choice_place-1">TOUTES</label></li>
						<?php $i = 2; foreach($_SESSION['achat_place'] as $requete){ ?>
						<li><input type="radio" name="choice_place[]" id="choice_place-<?php echo $i; ?>" value="<?php echo $requete; ?>"><label for="choice_place-<?php echo $i; ?>"><?php echo $requete. '<br />'; ?></label></li>
						<?php $i++; } ?>
					</ul>
				</fieldset>
				<fieldset class="category">
					<legend><i class="cp cp-enter"></i>Portes</legend>
					<ul>
						<li><input type="radio" name="choice_porte[]" id="choice_porte-1" value="" checked><label for="choice_porte-1">TOUTES</label></li>
						<?php $i = 2; foreach($_SESSION['achat_porte'] as $requete){ ?>
						<li><input type="radio" name="choice_porte[]" id="choice_porte-<?php echo $i; ?>" value="<?php echo $requete; ?>"><label for="choice_porte-<?php echo $i; ?>"><?php echo $requete. '<br />'; ?></label></li>
						<?php $i++; } ?>
					</ul>
				</fieldset>
				<fieldset class="category">
					<legend><i class="cp cp-enter"></i>Année</legend>
					<input type="number" name="annee_min" placeholder="Minimum" minlength="4" maxlength="4">
					<input type="number" name="annee_max" placeholder="Maximum" minlength="4" maxlength="4">
				</fieldset>
				<fieldset class="category">
					<legend><i class="cp cp-enter"></i>Prix</legend>
					<input type="number" name="prix_min" placeholder="Minimum">
					<input type="number" name="prix_max" placeholder="Maximum">
				</fieldset>
			</form>
			<!--Results-->
			<div id="modeles" class="main">
				<div id="results-top">
					<div>
						<i class="cp cp-filter"></i>
						<div><p id='nombre_resultat'><?php echo $nb_vehicules_achat; ?></p>résultat(s)</div>
					</div>
					<form method="GET" action="">
						<fieldset class="category">
							<label for="tri_achat">Tri</label>
							<select name="tri_achat" id="tri_achat" onchange="facettesAchat(this.value)">
								<option value="" >-- Trier par --</option>
								<option value="achat_annee_croissant" >Années croissantes</option>
								<option value="achat_annee_decroissant">Années décroissantes</option>
								<option value="achat_prix_croissant">Prix croissants</option>
								<option value="achat_prix_decroissant">Prix décroissants</option>
							</select>
						</fieldset>
					</form>
				</div>
				<div class="results">
				<?php foreach($_SESSION['achat'] as $requete){ ?>
					<a href="car-page.php?idCarAchat=<?php echo $requete['id']; ?>" title="" class="result">
						<div class="result-top">
							<p><?php echo $requete['marque']. '  '; ?><?php echo $requete['modelFamily']. '  '; ?><?php echo $requete['anneedesortie']; ?><p>
							<p><?php echo $requete['prix_vente']; ?> €</p>
						</div>
						<img src="/demos/beeyondauto/vue/assets/images/no-brand-default-model.webp">
						<div class="result-bottom">
							<div>
								<?php if ($requete['moteur'] === 'ELECTRIQUE') : ?>
									<img src="/demos/beeyondauto/vue/assets/images/car/electric.png" alt="">
								<?php else : ?>
									<img src="/demos/beeyondauto/vue/assets/images/car/gas.png" alt="">
								<?php endif; ?>
								<?php echo $requete['moteur']; ?>
							</div>
							<div>
								<img src="/demos/beeyondauto/vue/assets/images/car/gauge.png" alt="">
								<?php echo $requete['puissance_ch']. ' ch'; ?>
							</div>
							<div>
								<img src="/demos/beeyondauto/vue/assets/images/car/car.png" alt="">
								<?php echo $requete['type']; ?>
							</div>
						</div>
					</a>
				<?php } ?>
				</div>
				<div class="results"></div>
				<div class="page-nav">
					<input type="radio" name="pagination[]" id="pagination1" value="1" checked onchange="facettesAchat(this.value)"><label for="pagination-1">1</label></input>
					<input type="radio" name="pagination[]" id="pagination2" value="2" onchange="facettesAchat(this.value)"><label for="pagination-2">2</label></input>
					<input type="radio" name="pagination[]" id="pagination3" value="3" onchange="facettesAchat(this.value)"><label for="pagination-3">3</label></input>
					<input type="radio" name="pagination[]" id="pagination4" value="4" onchange="facettesAchat(this.value)"><label for="pagination-4">4</label></input>
					<input type="radio" name="pagination[]" id="pagination5" value="5" onchange="facettesAchat(this.value)"><label for="pagination-5">5</label></input>
					<input type="radio" name="pagination[]" id="pagination6" value="6" onchange="facettesAchat(this.value)"><label for="pagination-6">6</label></input>
				</div>
				<div class="page-nav"></div>
			</div>
		</div>
	</main>
<?php
	include '../structure/inc.footer.php';
?>