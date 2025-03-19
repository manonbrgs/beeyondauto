<?php
	session_start();
	include '../../structure/inc.header.php';
	include '../../../../modele/modele.php';
?>
<body>
	<!--Header-->
		<!--Results-->
		<div class="main">
			<div class="results">
			<?php foreach($_SESSION['louer'] as $requete){ ?>	
				<a href="car-page.php" title="" class="result">
					<div class="result-top">
						<p><?php echo $requete['marque']. '  '; ?><?php echo $requete['modelFamily']. '  '; ?><?php echo $requete['anneedesortie']; ?><p>
						<p><?php echo $requete['prix_journalier']; ?> €</p>
					</div>
					<img src="/demos/beeyondauto/vue/assets/images/no-brand-default-model.webp" alt="Photo d'une <?php echo $requete['marque']; echo $requete['modelFamily'];?>">
					<div class="result-bottom">
						<div>
							<img src="/demos/beeyondauto/vue/assets/images/car/gas.png" alt="">
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
		</div>
	</div>