<?php
	session_start();
	if(isset ($_POST['btn'])){
		include ('../../vue/pages/structure/inc.header.php');
	}else {
		include ('../structure/inc.header.php');
	}
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
                        <a href="/demos/beeyondauto/vue/pages/templates/mon-compte.php" title="Mon panier" class="btn"><i
                                class="cp cp-shopping-cart-o"></i></a>
                        <a href="mon-compte.php" title="Mon compte" class="btn btn-outline" data="Mon compte"><i
                                class="fa-regular fa-user"></i></a>
                        <?php else : ?>
                        <!-- Si l'utilisateur n'est pas connecté -->
                        <a href="connexion.php" title="Se connecter" class="btn btn-outline" data="Se connecter"><i
                                class="fa-regular fa-user"></i></a>
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
        <div class="content content-acc">
            <?php if($_SESSION && count($_SESSION) && array_key_exists('utilisateurs', $_SESSION) && !empty($_SESSION['utilisateurs'])) : ?>
            <!--Sidebar-->
            <div class="sidebar account-sidebar">
                <div class="sidebar-top">
                    <div>
                        <img src="/demos/beeyondauto/vue/assets/images/dp.webp" alt="avatar">
                        <p>Bienvenue,<br><span><?php echo $_SESSION['utilisateurs']['username'] ?></span></p>
                    </div>
                    <ul>
                        <li id="reservations" class="acc-active"><i class="cp cp-shopping-cart"></i>Mes réservations</li>
                        <li id="favs"><i class="cp cp-heart-o"></i>Mes favoris</li>
                        <li id="settings"><i class="cp cp-cog-o"></i>Paramètres</li>
                    </ul>
                </div>
                <div class="sidebar-bottom">
                    <a href="../../../modele/deconnexion.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Déconnexion</a>
                </div>
            </div>
            <!--Favoris-->
            <div class="main favs-content">
                <?php
                    if (!empty($_SESSION['favoris_achat'])) {
                        $vehicle = $_SESSION['favoris_achat'][0];

                        $marque = $vehicle['marque'];
                        $model = $vehicle['modelFamily'];
                        $annee = $vehicle['anneedesortie'];
                        $prix = $vehicle['prix_vente'];
                        $moteur = $vehicle['moteur'];
                        $puissance_ch = $vehicle['puissance_ch'];
                        $boite_de_vitesse = $vehicle['boitedevitesse'];
                        $nombre_de_portes = $vehicle['nombredeportes'];
                        $nombre_de_places = $vehicle['nombredeplaces'];
                        $etat = $vehicle['etat'];
                        $image_url = '/demos/beeyondauto/vue/assets/images/no-brand-default-model.webp' ;?>
                <?php foreach ($_SESSION['favoris_achat'] as $vehicle) { ?>
                <div class="results results-account">
                    <a href="car-page.php?idCarAchat=<?php echo $vehicle['id']; ?>" title="" class="result">
                        <div class="result-top">
                            <p><?php echo $vehicle['marque'] . ' ' . $vehicle['modelFamily'] . ' ' . $vehicle['anneedesortie']; ?>
                            <p>
                            <p><?php echo $vehicle['prix_vente']; ?> €</p>
                        </div>
                        <img src="<?php echo $image_url; ?>" alt="">
                        <div class="result-bottom">
                            <div>
                                <?php if ($vehicle['moteur'] === 'ELECTRIQUE') : ?>
                                    <img src="/demos/beeyondauto/vue/assets/images/car/electric.png" alt="">
                                <?php else : ?>
                                    <img src="/demos/beeyondauto/vue/assets/images/car/gas.png" alt="">
                                <?php endif; ?>
                                <?php echo $vehicle['moteur']; ?>
                            </div>
                            <div>
                                <img src="/demos/beeyondauto/vue/assets/images/car/gauge.png" alt="">
                                <?php echo $vehicle['puissance_ch']; ?> ch
                            </div>
                            <div>
                                <img src="/demos/beeyondauto/vue/assets/images/car/car.png" alt="">
                                <?php echo $vehicle['boitedevitesse']; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                        }
                    } else {
                        echo "<p>Vous n'avez pas de véhicules en favoris</p>";
                    }
                    ?>
            </div>
            <!--Réservations-->
            <div class="main reservations-content">
                <?php
                    if (!empty($_SESSION['reservation_achat'])) {
                        $vehicle2 = $_SESSION['reservation_achat'][0];

                        $marque = $vehicle2['marque'];
                        $model = $vehicle2['modelFamily'];
                        $annee = $vehicle2['anneedesortie'];
                        $prix = $vehicle2['prix_vente'];
                        $moteur = $vehicle2['moteur'];
                        $puissance_ch = $vehicle2['puissance_ch'];
                        $boite_de_vitesse = $vehicle2['boitedevitesse'];
                        $nombre_de_portes = $vehicle2['nombredeportes'];
                        $nombre_de_places = $vehicle2['nombredeplaces'];
                        $etat = $vehicle2['etat'];
                        $image_url = '/demos/beeyondauto/vue/assets/images/no-brand-default-model.webp' ;?>
                <?php foreach ($_SESSION['reservation_achat'] as $vehicle) { ?>
                <div class="results results-account">
                    <a href="car-page.php?idCarAchat=<?php echo $vehicle['id']; ?>" title="" class="result">
                        <div class="result-top">
                            <p><?php echo $vehicle['marque'] . ' ' . $vehicle['modelFamily'] . ' ' . $vehicle['anneedesortie']; ?>
                            <p>
                            <p><?php echo $vehicle['prix_vente']; ?> €</p>
                        </div>
                        <img src="<?php echo $image_url; ?>" alt="">
                        <div class="result-bottom">
                            <div>
                                <?php if ($vehicle['moteur'] === 'ELECTRIQUE') : ?>
                                    <img src="/demos/beeyondauto/vue/assets/images/car/electric.png" alt="">
                                <?php else : ?>
                                    <img src="/demos/beeyondauto/vue/assets/images/car/gas.png" alt="">
                                <?php endif; ?>
                                <?php echo $vehicle['moteur']; ?>
                            </div>
                            <div>
                                <img src="/demos/beeyondauto/vue/assets/images/car/gauge.png" alt="">
                                <?php echo $vehicle['puissance_ch']; ?> ch
                            </div>
                            <div>
                                <img src="/demos/beeyondauto/vue/assets/images/car/car.png" alt="">
                                <?php echo $vehicle['boitedevitesse']; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                        }
                    } else {
                        echo "<p>Vous n'avez pas de véhicules reservés</p>";
                    }
                ?>
            </div>
            <!--Paramètres-->
            <div class="main settings-content">
                <form method="POST" action="../../../modele/compte_settings/compte_settings.php" id="form" autocomplete="off">
                    <div>
                        <fieldset class="category">
                            <legend><i class="fa-solid fa-address-card"></i>Prénom</legend>
                            <label for="name">Prénom</label>
                            <input type="text" id="name" name="prenom" minlength="1" maxlength="20"
                                placeholder="<?php  echo $_SESSION['utilisateurs']['prenom']  ?>">
                        </fieldset>
                        <fieldset class="category">
                            <legend><i class="fa-solid fa-people-group"></i>Nom</legend>
                            <label for="surname">Nom</label>
                            <input type="text" id="surname" name="nom" minlength="1" maxlength="20"
                                placeholder="<?php  echo $_SESSION['utilisateurs']['nom']  ?>">
                        </fieldset>
                    </div>
                    <div>
                        <fieldset class="category">
                            <legend><i class="fa-solid fa-circle-user"></i>Pseudo</legend>
                            <label for="username">Pseudo</label>
                            <input type="text" id="username" name="username" minlength="1" maxlength="20"
                                placeholder="<?php  echo $_SESSION['utilisateurs']['username']  ?>">
                        </fieldset>
                    </div>
                    <div>
                        <fieldset class="category">
                            <legend><i class="fa-solid fa-at"></i>E-mail</legend>
                            <label for="mail">E-mail</label>
                            <input type="email" id="mail" name="mail"
                                placeholder="<?php  echo $_SESSION['utilisateurs']['mail']  ?>">
                        </fieldset>
                    </div>
                    <div>
                        <fieldset class="category">
                            <legend><i class="fa-solid fa-lock"></i>Mot de passe</legend>
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="motdepasse" placeholder="Mot de passe">
                        </fieldset>
                        <fieldset class="category">
                            <legend><i class="fa-solid fa-key"></i>Confirmation mot de passe</legend>
                            <label for="conf-mdp">Confirmation mot de passe</label>
                            <input type="password" id="conf-mdp" name="conf-mdp" placeholder="Confirmez votre mot de passe">
                        </fieldset>
                    </div>
                    <div class="btn btn-outline" data="Modifier mes informations">
                        <input name="btn" type="submit" value="">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </div>
                </form>
            </div>
        </div>
        <?php else :  ?>
        <!--Si l'utilisateur n'est pas connecté-->
        <h2 class="to-left title-connect"><a href="connexion.php">Connectez-vous</a> pour accéder à votre compte</h2>
        <?php endif; ?>
    </main>
<?php
    if(isset ($_POST['btn'])){
        include ('../../vue/pages/structure/inc.footer.php');
    }else {
        include ('../structure/inc.footer.php');
    }
?>
