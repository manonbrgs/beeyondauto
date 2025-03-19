<?php
	session_start();
	include '../structure/inc.header.php';
	include_once '../../../modele/modele.php';
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
		</header>
		<div class="content acc-content sign-up-content" id="inscription_ok">
			<div class=" feedback-msg validate">
				<i class="cp cp-check-mark"></i><div>Votre inscription a bien été prise en compte !<a href="connexion.php"> Connectez-vous !</a></div>
			</div>
		</div>
		<div class="content acc-content sign-up-content" id="inscription_en_cours">
			<form method="post" action="" id="inscription" autocomplete="off">
				<div id="prenom_msg">Saisissez un prénom contenant entre 2 et 30 lettres</div>
				<div id="nom_msg">Saisissez un nom contenant entre 2 et 30 lettres</div>
				<div class="form-inline">
					<fieldset class="category">
						<legend><i class="fa-solid fa-address-card"></i>Prénom</legend>
						<label for="name">Prénom</label>
						<input type="text" id="name" name="prenom" minlength="1" maxlength="30" placeholder="Prénom">
					</fieldset>
					<fieldset class="category">
						<legend><i class="fa-solid fa-people-group"></i>Nom</legend>
						<label for="surname">Nom</label>
						<input type="text" id="surname" name="nom" minlength="1" maxlength="30" placeholder="Nom">
					</fieldset>
				</div>
				<div id="mail_msg">Saisissez une adresse mail valide</div>
				<fieldset class="category">
					<legend><i class="fa-solid fa-at"></i>E-mail</legend>
						<label for="mail">E-mail</label>
						<input type="email" id="mail" name="mail" placeholder="addresse@mail.com">
				</fieldset>
				<div id="username_msg">Saisissez un pseudo contenant entre 3 et 30 caractères (lettres et chiffres autorisés uniquement)</div>
				<div id="username_exist">Pseudo déjà existant</div>
				<fieldset class="category">
					<legend><i class="fa-solid fa-circle-user"></i>Pseudo</legend>
					<label for="username">Pseudo</label>
					<input type="text" id="username" name="username" minlength="3" maxlength="25" placeholder="Pseudo">
				</fieldset>
				<div id="motdepasse_msg">Saisissez un mot de passe de minimum 8 caractères contenant au moins : un chiffre, une lettre minuscule, une lettre majuscule et un caractère spécial</div>
				<fieldset class="category">
					<legend><i class="fa-solid fa-lock"></i>Mot de passe</legend>
					<label for="password">Mot de passe</label>
					<input type="password" id="password" name="motdepasse" placeholder="Mot de passe">
				</fieldset>
				<div id="confmdp_msg">Le mot de passe saisi est incorrect</div>
				<fieldset class="category">
					<legend><i class="fa-solid fa-key"></i>Confirmation mot de passe</legend>
					<label for="conf-mdp">Confirmation mot de passe</label>
					<input type="password" id="conf-mdp" name="conf-mdp" placeholder="Confirmez votre mot de passe">
				</fieldset>
				<div class="btn btn-outline btn-dark" data="S'inscrire">
					<input type="submit" value="" name="submit_inscription">
					<i class="fa-solid fa-arrow-right-long"></i>
				</div>
			</form>
			<p>Vous êtes déjà inscrit ? <a href="connexion.php">Connectez-vous !</a></p>
		</div>
	</main>
<?php
	include '../structure/inc.footer.php';
?>
<script>
	var inscription = document.getElementById("inscription");
	var inscription_ok = document.getElementById('inscription_ok');
	var inscription_en_cours = document.getElementById('inscription_en_cours');
	var prenom_msg = document.getElementById('prenom_msg');
	var nom_msg = document.getElementById('nom_msg');
	var mail_msg = document.getElementById('mail_msg');
	var username_msg = document.getElementById('username_msg');
	var username_exist = document.getElementById('username_exist');
	var motdepasse_msg = document.getElementById('motdepasse_msg');
	var conf_mdp_msg = document.getElementById('confmdp_msg');

	inscription_ok.style.display = "none";
	prenom_msg.style.display = "none";
	nom_msg.style.display = "none";
	mail_msg.style.display = "none";
	username_msg.style.display = "none";
	username_exist.style.display = "none";
	motdepasse_msg.style.display = "none";
	confmdp_msg.style.display = "none";

	inscription.addEventListener('submit', function(event){
		event.preventDefault();

		var data = new FormData(this);

		var xhr = new XMLHttpRequest();
		
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				console.log(this.response);
				if(this.response.prenom_msg){
					event.preventDefault();

					nom_msg.style.display = "none";
					mail_msg.style.display = "none";
					username_msg.style.display = "none";
					username_exist.style.display = "none";
					motdepasse_msg.style.display = "none";
					confmdp_msg.style.display = "none";
					prenom_msg.style.display = "block";

					return false;
				}
				if(this.response.nom_msg){
					event.preventDefault();

					nom_msg.style.display = "block";
					mail_msg.style.display = "none";
					username_msg.style.display = "none";
					username_exist.style.display = "none";
					motdepasse_msg.style.display = "none";
					confmdp_msg.style.display = "none";
					prenom_msg.style.display = "none";

					return false;
				}
				if(this.response.mail_msg){
					event.preventDefault();

					nom_msg.style.display = "none";
					mail_msg.style.display = "block";
					username_msg.style.display = "none";
					username_exist.style.display = "none";
					motdepasse_msg.style.display = "none";
					confmdp_msg.style.display = "none";
					prenom_msg.style.display = "none";

					return false;
				}
				if(this.response.username_msg){
					event.preventDefault();

					nom_msg.style.display = "none";
					mail_msg.style.display = "none";
					username_msg.style.display = "block";
					username_exist.style.display = "none";
					motdepasse_msg.style.display = "none";
					confmdp_msg.style.display = "none";
					prenom_msg.style.display = "none";

					return false;
				}
				if(this.response.username_exist){
					event.preventDefault();

					nom_msg.style.display = "none";
					mail_msg.style.display = "none";
					username_msg.style.display = "none";
					username_exist.style.display = "block";
					motdepasse_msg.style.display = "none";
					confmdp_msg.style.display = "none";
					prenom_msg.style.display = "none";

					return false;
				}
				if(this.response.motdepasse_msg){
					event.preventDefault();

					nom_msg.style.display = "none";
					mail_msg.style.display = "none";
					username_msg.style.display = "none";
					username_exist.style.display = "none";
					motdepasse_msg.style.display = "block";
					confmdp_msg.style.display = "none";
					prenom_msg.style.display = "none";

					return false;
				}
				if(this.response.confmdp_msg){
					event.preventDefault();

					nom_msg.style.display = "none";
					mail_msg.style.display = "none";
					username_msg.style.display = "none";
					username_exist.style.display = "none";
					motdepasse_msg.style.display = "none";
					confmdp_msg.style.display = "block";
					prenom_msg.style.display = "none";

					return false;
				}

				if(this.response.correct){
					event.preventDefault();
					inscription_en_cours.style.display = "none";
					inscription_ok.style.display = "flex";
					return false;
				} else {
					inscription_en_cours.style.display = "flex";
					inscription_ok.style.display = "none";
				}
			};
		};

		xhr.open("POST", "../../../controleur/gestion_client/inscriptionControleur.php", true);
		xhr.responseType = "json";
		xhr.send(data);

		return false;
	});
</script>