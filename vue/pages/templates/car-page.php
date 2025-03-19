<?php
    session_start();
	require_once '../structure/inc.header.php';
	require_once '../../../modele/modele.php';
	require_once '../../../controleur/controleur.php';
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
        <div class="content car-content">
        <?php if (isset($_GET['idCarAchat'])) : ?>
            <?php foreach($_SESSION['car_page_achat'] as $requete){ ?>
                <p class="fil-dariane"><a href="achat.php" title="Tous les véhicules à vendre">/ Acheter</a> / <a href="car-page.php?idCarAchat=<?php echo $requete['id']; ?>" title="<?php echo $requete['marque']. " " .$requete['modelFamily']; ?>"><?php echo $requete['marque']. " " .$requete['modelFamily']; ?></a></p>
                <div class="car">
                    <div class="car-left">
                        <h2><?php echo $requete['prix_vente'] ?> <span>€</span></h2>
                        <img class="car-img" src="/demos/beeyondauto/vue/assets/images/no-brand-default-model.webp">
                        <div>
                            <h1 class="to-left"><?php echo $requete['marque'] ?> <?php echo $requete['modelFamily'] ?></h1>
                            <p><?php echo $requete['anneedesortie'] ?></p>
                        </div>
                        <img src="/demos/beeyondauto/vue/assets/images/background/blurry-circle2.png" alt="" class="blurry-circle blurry-circle-2">
                        <img src="/demos/beeyondauto/vue/assets/images/background/lines3.png" alt="" class="line">
                    </div>
                    <div class="car-right">
                        <div class="car-infos">
                            <div class="car-column">
                                <div class="car-info ci-bg ci-accent">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/car.png" alt="">
                                    <?php echo $requete['type'] ?>
                                </div>
                                <div class="car-info ci-sm ci-white">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/gauge.png" alt="">
                                    <?php echo $requete['boitedevitesse'] ?>
                                </div>
                            </div>
                            <div class="car-column">
                                <div class="car-info ci-sm ci-black">
                                <?php if ($requete['moteur'] === 'ELECTRIQUE') : ?>
                                    <img src="/demos/beeyondauto/vue/assets/images/car/electric.png" alt="">
                                <?php else : ?>
                                    <img src="/demos/beeyondauto/vue/assets/images/car/gas.png" alt="">
                                <?php endif; ?>
                                    <?php echo $requete['moteur'] ?>
                                </div>
                                <div class="car-info ci-bg ci-yellow">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/engine.png" alt="">
                                    <?php echo $requete['puissance_ch'] ?> ch
                                </div>
                            </div>
                            <div class="car-column">
                                <div class="car-info ci-bg ci-white">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/door.png" alt="">
                                    <?php echo $requete['nombredeportes'] ?> portes
                                </div>
                                <div class="car-info ci-sm ci-black">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/seat.png" alt="">
                                    <?php echo $requete['nombredeplaces'] ?> places
                                </div>
                            </div>
                        </div>
                        <?php if($_SESSION && count($_SESSION) && array_key_exists('utilisateurs', $_SESSION) && !empty($_SESSION['utilisateurs'])) :  ?>
                        <form method="post" action="" id='reservation_achat'>
                            <fieldset class="category">
                                <legend><i class="cp cp-add-o"></i>Quantité</legend>
                                <input type="number" min="0" name="quantite" id="quantite" car-id-achat="<?php echo strip_tags($_GET['idCarAchat']); ?>" 
                                    car-user="<?php echo $_SESSION['utilisateurs']['username']?>" name="quantite" value=""  oninput="verificationQuantite(this.value)">
                            </fieldset>
                            <div class="results_reservation_msg">
                                <div id="resultat_quantite"></div>
                                <div id="resultat_reservation_achat"></div>
                            </div>
                        </form>
                        <div class="car-btns">
                            <a title="Réserver" id="reserver" class="btn btn-outline" data="Réserver" onclick="reservation()"><i class="cp cp-shopping-cart"></i></a>
                            <a title="Ajouté aux favoris" class="btn" onclick="favorisAchat()"><i class="cp cp-heart"></i>Ajouter aux favoris</a>
                        </div>
                        <?php else : ?>
                            <h2 class=""><a href="connexion.php">Connectez-vous</a> pour réserver et ajouter aux favoris</h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php elseif (isset($_GET['idCarLocation'])) : ?>
            <?php foreach($_SESSION['car_page_location'] as $requete){ ?>
                <p class="fil-dariane"><a href="location.php" title="Tous les véhicules à louer">/ Louer</a> / <a href="car-page.php?idCarLocation=<?php echo $requete['id']."&idPageLocation=".$requete['id']; ?>" title="<?php echo $requete['marque']. " " .$requete['modelFamily']; ?>"><?php echo $requete['marque']. " " .$requete['modelFamily']; ?></a></p>
                <div class="car">
                    <div class="car-left">
                        <h2><?php echo $requete['prix_journalier'] ?> <span>€</span></h2>
                        <img class="car-img" src="https://cdn.imagin.studio/getImage?&customer=frbeeyond-auto&make=<?php echo $requete['marque'];?>&modelFamily=<?php echo $requete['modelFamily'];?>&modelRange=<?php echo $requete['modelRange'];?>&modelVariant=<?php echo $requete['modelVariant'];?>&paintId=pspc0041&angle=01&zoomType=fullscreen" title="Photo d'une <?php echo $requete['marque']." ".$requete['modelFamily'];?>" alt="Photo d'une <?php echo $requete['marque']; echo $requete['modelFamily'];?>">
                        <div>
                            <h1 class="to-left"><?php echo $requete['marque'] ?> <?php echo $requete['modelFamily'] ?></h1>
                            <p><?php echo $requete['anneedesortie'] ?></p>
                        </div>
                        <img src="/demos/beeyondauto/vue/assets/images/background/blurry-circle2.png" alt="" class="blurry-circle blurry-circle-2">
                        <img src="/demos/beeyondauto/vue/assets/images/background/lines3.png" alt="" class="line">
                    </div>
                    <div class="car-right">
                        <div class="car-infos">
                            <div class="car-column">
                                <div class="car-info ci-bg ci-accent">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/car.png" alt="">
                                    <?php echo $requete['type'] ?>
                                </div>
                                <div class="car-info ci-sm ci-white">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/gauge.png" alt="">
                                    <?php echo $requete['boitedevitesse'] ?>
                                </div>
                            </div>
                            <div class="car-column">
                                <div class="car-info ci-sm ci-black">
                                <?php if ($requete['moteur'] === 'ELECTRIQUE') : ?>
                                    <img src="/demos/beeyondauto/vue/assets/images/car/electric.png" alt="">
                                <?php else : ?>
                                    <img src="/demos/beeyondauto/vue/assets/images/car/gas.png" alt="">
                                <?php endif; ?>
                                    <?php echo $requete['moteur'] ?>
                                </div>
                                <div class="car-info ci-bg ci-yellow">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/engine.png" alt="">
                                    <?php echo $requete['puissance_ch'] ?> ch
                                </div>
                            </div>
                            <div class="car-column">
                                <div class="car-info ci-bg ci-white">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/door.png" alt="">
                                    <?php echo $requete['nombredeportes'] ?> portes
                                </div>
                                <div class="car-info ci-sm ci-black">
                                    <img src="/demos/beeyondauto/vue/assets/images/car/seat.png" alt="">
                                    <?php echo $requete['nombredeplaces'] ?> places
                                </div>
                            </div>
                        </div>
                        <?php if($_SESSION && count($_SESSION) && array_key_exists('utilisateurs', $_SESSION) && !empty($_SESSION['utilisateurs'])) :  ?>
                        <form method="post" action="" id='reservation_location'>
                            <div class="form-inline">
                                <fieldset class="category">
                                    <legend><i class="cp cp-calendar"></i>Départ</legend>
                                    <input type="date" name="datedebut" id="input-date-debut" car-id="<?php echo strip_tags($_GET['idPageLocation']); ?>" 
                                        name="datedebut" value=""  onchange="verificationDateLocation(this.value)">
                                </fieldset>
                                <fieldset class="category">
                                    <legend><i class="cp cp-calendar"></i>Fin</legend>
                                    <input type="date" name="datefin" value="" id="input-date-fin" onchange="verificationDateLocation(this.value)" car-user="<?php echo $_SESSION['utilisateurs']['username']?>">
                                </fieldset>
                            </div>
                            <div class="results_reservation_msg">
                                <div id="resultat_date_debut"></div>
                                <div id="resultat_date_fin"></div>
                                <div id="resultat_coherence_dates"></div>
                                <div id="resultat_reservation_location"></div>
                            </div>
                        </form>
                        <div class="car-btns">
                            <a title="Réserver" class="btn btn-outline" data="Réserver" onclick="reservationLocation();"><i class="cp cp-shopping-cart"></i></a>
                            <a onclick="favorisLocation();" title="Ajouté aux favoris" class="btn"><i class="cp cp-heart"></i>Ajouter aux favoris</a>
                        </div>
                        <?php else : ?>
                            <h2 class=""><a href="connexion.php">Connectez-vous</a> pour réserver et ajouter aux favoris</h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php endif; ?>
    </main>
<?php
	include '../structure/inc.footer.php';
?>