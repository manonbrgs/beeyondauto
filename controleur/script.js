/**-------- PAGE ACHAT -----------**/

    // TRI

    var selectTriAchat = document.getElementById('tri_achat');

    // PAGINATION

    var divpagination = document.getElementsByClassName('page-nav')[0];

    // NAVIGATION A FACETTES
    var formulaireAchat = document.getElementById('navigationFacettesAchat');
	var allResults = document.getElementsByClassName('results')[0];
	var results = document.getElementsByClassName('results')[1];
    var nombreResults = document.getElementById('nombre_resultat');

    var paginationFunction = document.querySelectorAll('input[name="pagination[]"]');
    

	function facettesAchat(){

		allResults.style.display = "none";
        //divpagination.style.display = "none";

		const etat = document.querySelector('input[name="choice_etat[]"]:checked').value;
		const marque = document.querySelector('input[name="choice_marque[]"]:checked').value;
		const type = document.querySelector('input[name="choice_type[]"]:checked').value;
		const moteur = document.querySelector('input[name="choice_moteur[]"]:checked').value;
		const boitedevitesse = document.querySelector('input[name="choice_boitedevitesse[]"]:checked').value;
		const place = document.querySelector('input[name="choice_place[]"]:checked').value;
		const porte = document.querySelector('input[name="choice_porte[]"]:checked').value;
		const minannee = document.querySelector('input[name="annee_min"]').value;
		const maxannee = document.querySelector('input[name="annee_max"]').value;
		const minprix = document.querySelector('input[name="prix_min"]').value;
		const maxprix = document.querySelector('input[name="prix_max"]').value;
        const recherche = document.querySelector('input[name=search_text]').value;

        const optionTriAchat = selectTriAchat.options[selectTriAchat.selectedIndex];
        const valueTriAchat = optionTriAchat.value;

        var page = document.querySelector('input[name="pagination[]"]:checked').value;
        var nbvehiculesparpage = 9;
        var nbvehiculestotale = 0;
        var premierarticle = (page * nbvehiculesparpage) - nbvehiculesparpage;
        var divpaginationasync = document.getElementsByClassName('page-nav')[1];

        divpaginationasync.innerHTML = "";

		function afficherResultats(resultats) {

			var tableauHTML = "";
			
			for (var i = 0; i < resultats.length; i++) {
                if (resultats[i].moteur === 'ELECTRIQUE'){
                    tableauHTML += '<a href="car-page.php?idCarAchat='+ resultats[i].id +'" title="" class="result"><div class="result-top"><p>' + resultats[i].marque + ' ' + resultats[i].modelFamily + ' ' + resultats[i].anneedesortie + '</p><p>' + resultats[i].prix_vente +' €</p></div><img src="/demos/beeyondauto/vue/assets/images/no-brand-default-model.webp" alt="Photo d\'une '+resultats[i].marque+' '+resultats[i].modelFamily+'"><div class="result-bottom"><div><img src="/demos/beeyondauto/vue/assets/images/car/electric.png" alt="">'+ resultats[i].moteur +'</div><div><img src="/demos/beeyondauto/vue/assets/images/car/gauge.png" alt="">'+ resultats[i].puissance_ch +' ch</div><div><img src="/demos/beeyondauto/vue/assets/images/car/car.png" alt="">'+ resultats[i].type +'</div></div></a>';
                } else {
                    tableauHTML += '<a href="car-page.php?idCarAchat='+ resultats[i].id +'" title="" class="result"><div class="result-top"><p>' + resultats[i].marque + ' ' + resultats[i].modelFamily + ' ' + resultats[i].anneedesortie + '</p><p>' + resultats[i].prix_vente +' €</p></div><img src="/demos/beeyondauto/vue/assets/images/no-brand-default-model.webp" alt="Photo d\'une '+resultats[i].marque+' '+resultats[i].modelFamily+'"><div class="result-bottom"><div><img src="/demos/beeyondauto/vue/assets/images/car/gas.png" alt="">'+ resultats[i].moteur +'</div><div><img src="/demos/beeyondauto/vue/assets/images/car/gauge.png" alt="">'+ resultats[i].puissance_ch +' ch</div><div><img src="/demos/beeyondauto/vue/assets/images/car/car.png" alt="">'+ resultats[i].type +'</div></div></a>';
                }
			}

			results.innerHTML = tableauHTML;
			
		}

		const xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4 && xhr.status === 200) {
                var resultats = JSON.parse(this.responseText);
                var resultats2 = resultats.acheter_nbvehiculestotales;
                nbvehiculestotale = resultats2[0].nb_vehicules_achat;
                
                var nbpagestotales = Math.ceil(nbvehiculestotale/nbvehiculesparpage);
                afficherResultats(resultats.acheter);

                console.log(this.response);                

                nombreResults.innerHTML = nbvehiculestotale;
			}
		}

		xhr.open("POST", "../../../controleur/navigation_facettes/facettes_achatControleur.php", true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		const params = 
			"etat=" + etat + 
			"&marque=" + marque + 
			"&type=" + type + 
			"&moteur=" + moteur + 
			"&boitedevitesse=" + boitedevitesse +
			"&place=" + place +
			"&porte=" + porte +
			"&minannee=" + minannee +
			"&maxannee=" + maxannee +
			"&minprix=" + minprix +
			"&maxprix=" + maxprix +
            "&recherche=" + recherche +
            "&triachat=" + valueTriAchat +
            "&premierarticle=" + premierarticle +
            "&nbvehiculesparpage=" + nbvehiculesparpage +
            "&nbvehiculestotale=" + nbvehiculestotale +
            "&page=" + page;

		
		xhr.send(params);

    }
    

/**-------- PAGE LOCATION -----------**/

    // TRI

    var selectTriLocation = document.getElementById('tri_location');

    // PAGINATION

    // NAVIGATION A FACETTES

	function facettesLocation(){
            
        var disponibilite = document.querySelector('input[name="choice_disponibilite[]"]:checked').value;
        var marque = document.querySelector('input[name="choice_marque[]"]:checked').value;
        var type = document.querySelector('input[name="choice_type[]"]:checked').value;
        var moteur = document.querySelector('input[name="choice_moteur[]"]:checked').value;
        var boitedevitesse = document.querySelector('input[name="choice_boitedevitesse[]"]:checked').value;
        var place = document.querySelector('input[name="choice_place[]"]:checked').value;
        var porte = document.querySelector('input[name="choice_porte[]"]:checked').value;
        var minannee = document.querySelector('input[name="annee_min"]').value;
        var maxannee = document.querySelector('input[name="annee_max"]').value;
        var minprix = document.querySelector('input[name="prix_min"]').value;
        var maxprix = document.querySelector('input[name="prix_max"]').value;
        var recherche = document.querySelector('input[name=search_text]').value;

        var optionTriLocation = selectTriLocation.options[selectTriLocation.selectedIndex];
        var valueTriLocation = optionTriLocation.value;
        
        var page = document.querySelector('input[name="pagination[]"]:checked').value;
        var nbvehiculesparpage = 9;
        var nbvehiculestotale = 0;
        var premierarticle = (page * nbvehiculesparpage) - nbvehiculesparpage;
        var divpaginationasync = document.getElementsByClassName('page-nav')[1];

        allResults.style.display = "none";
        divpaginationasync.innerHTML = "";
        
        function afficherResultats(resultats) {

            var tableauHTML = "";
            
            for (var i = 0; i < resultats.length; i++) {
                if (resultats[i].moteur === 'ELECTRIQUE'){
                    tableauHTML += '<a href="car-page.php?idCarLocation='+ resultats[i].id +'&idPageLocation='+ resultats[i].id +'" title="" class="result"><div class="result-top"><p>' + resultats[i].marque + ' ' + resultats[i].modelFamily + ' ' + resultats[i].anneedesortie + '</p><p>' + resultats[i].prix_journalier +' €</p></div><img src="/demos/beeyondauto/vue/assets/images/no-brand-default-model.webp" alt="Photo d\'une '+resultats[i].marque+' '+resultats[i].modelFamily+'"><div class="result-bottom"><div><img src="/demos/beeyondauto/vue/assets/images/car/electric.png" alt="">'+ resultats[i].moteur +'</div><div><img src="/demos/beeyondauto/vue/assets/images/car/gauge.png" alt="">'+ resultats[i].puissance_ch +' ch</div><div><img src="/demos/beeyondauto/vue/assets/images/car/car.png" alt="">'+ resultats[i].type +'</div></div></a>';
                } else {
                    tableauHTML += '<a href="car-page.php?idCarLocation='+ resultats[i].id +'&idPageLocation='+ resultats[i].id +'" title="" class="result"><div class="result-top"><p>' + resultats[i].marque + ' ' + resultats[i].modelFamily + ' ' + resultats[i].anneedesortie + '</p><p>' + resultats[i].prix_journalier +' €</p></div><img src="/demos/beeyondauto/vue/assets/images/no-brand-default-model.webp" alt="Photo d\'une '+resultats[i].marque+' '+resultats[i].modelFamily+'"><div class="result-bottom"><div><img src="/demos/beeyondauto/vue/assets/images/car/gas.png" alt="">'+ resultats[i].moteur +'</div><div><img src="/demos/beeyondauto/vue/assets/images/car/gauge.png" alt="">'+ resultats[i].puissance_ch +' ch</div><div><img src="/demos/beeyondauto/vue/assets/images/car/car.png" alt="">'+ resultats[i].type +'</div></div></a>';
                }
            }

            results.innerHTML = tableauHTML;
            
        }

        var xhr = new XMLHttpRequest();
       
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var resultats = JSON.parse(this.responseText);
                var resultats2 = resultats.louer_nbvehiculestotales;
                nbvehiculestotale = resultats2[0].nb_vehicules_louer;
                
                var nbpagestotales = Math.ceil(nbvehiculestotale/nbvehiculesparpage);
                console.log(nbpagestotales);
                afficherResultats(resultats.louer);
                
                nombreResults.innerHTML = nbvehiculestotale;
            }
        }

        xhr.open("POST", "../../../controleur/navigation_facettes/facettes_locationControleur.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        var params = 
            "disponibilite=" + disponibilite +
            "&marque=" + marque + 
            "&type=" + type + 
            "&moteur=" + moteur + 
            "&boitedevitesse=" + boitedevitesse +
            "&place=" + place +
            "&porte=" + porte +
            "&minannee=" + minannee +
            "&maxannee=" + maxannee +
            "&minprix=" + minprix +
            "&maxprix=" + maxprix +
            "&recherche=" + recherche +
            "&trilocation=" + valueTriLocation +
            "&premierarticle=" + premierarticle +
            "&nbvehiculesparpage=" + nbvehiculesparpage +
            "&nbvehiculestotale=" + nbvehiculestotale +
            "&page=" + page;

        
        xhr.send(params);
    }

/**-------- PAGE CAR-PAGE (PRODUIT) -----------**/

    // LOCATION
    var resultatDateDebut = document.getElementById("resultat_date_debut");
    var resultatDateFin = document.getElementById("resultat_date_fin");
    var resultatCoherencesDates = document.getElementById('resultat_coherence_dates');

    var inputDateDebut = document.getElementById("input-date-debut");
    var inputDateFin = document.getElementById("input-date-fin");

    var attributIdCarLocation = inputDateDebut.getAttribute('car-id');    
    
    var btnAjoutReservation = document.getElementsByClassName('btn btn-outline')[1];

    function verificationDateLocation (){
        var datedebut = document.querySelector('input[name=datedebut]').value;
        var datefin = document.querySelector('input[name=datefin]').value;
        
        var xhr = new XMLHttpRequest();
       
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(this.response);
                var retourdebut = JSON.parse(this.responseText);
                var retourfin = retourdebut.msgfin;
                var coherencedates = retourdebut.coherencedates;
                var resultat_reservation_location = document.getElementById('resultat_reservation_location');

                resultatDateDebut.innerHTML = retourdebut.msgdebut;
                resultatDateFin.innerHTML = retourfin;
                resultatCoherencesDates.innerHTML = coherencedates;

                if (retourdebut.success){

                    btnAjoutReservation.onclick = function reservationLocation(){

                        var car_user = inputDateFin.getAttribute('car-user');

                        resultat_reservation_location.style.display = 'none';

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                
                                var retour = JSON.parse(this.responseText);
                
                                if (retour.msg_success){
                                    
                                    resultatDateDebut.style.display='none';
                                    resultatDateFin.style.display='none';
                                    resultat_reservation_location.style.display = 'flex';
                                    resultat_reservation_location.innerHTML = retour.msg_success;
                
                                } else if (retour.msg_echec) {
                
                                    resultat_reservation_location.style.display = 'flex';
                                    resultat_reservation_location.innerHTML = retour.msg_echec;
                
                                }      
                            }
                        }
                
                        xhr.open("POST", "../../../controleur/page_produit/reservation_locationControleur.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                
                        var params = 
                            "choixdatedebut=" + datedebut +
                            "&choixdatefin=" + datefin + 
                            "&idPageLocation=" + attributIdCarLocation + 
                            "&username=" + car_user;
                
                        xhr.send(params);
                    };

                } else {

                    btnAjoutReservation.onclick = function (){return false};

                }       
            }
        }

        xhr.open("POST", "../../../controleur/page_produit/page_produit_locationControleur.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        var params = 
            "choixdatedebut=" + datedebut +
            "&choixdatefin=" + datefin + 
            "&idPageLocation=" + attributIdCarLocation;

        xhr.send(params);
    }

    function favorisLocation(){

        resultat_reservation_location.style.display = 'none';

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

                var retour = JSON.parse(this.responseText);

                if (retour.success){

                    resultat_reservation_location.style.display = 'flex';
                    resultat_reservation_location.innerHTML = retour.success;

                } else if (retour.echec) {

                    resultat_reservation_location.style.display = 'flex';
                    resultat_reservation_location.innerHTML = retour.echec;

                }      
            }
        }

        xhr.open("POST", "../../../controleur/page_produit/favoris_locationControleur.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        var params = 
            "idPageLocation=" + attributIdCarLocation;

        xhr.send(params);
    };

    // ACHAT	

    function verificationQuantite(){

        var quantite = document.querySelector('input[name=quantite]');
        var attributIdCarAchat = quantite.getAttribute('car-id-achat');
        var btnReservation = document.getElementById('reserver');
        var resultat_reservation = document.getElementById('resultat_reservation_achat');
        var resultaQuantite = document.getElementById('resultat_quantite');

        resultat_reservation.style.display = 'none';

        var xhr = new XMLHttpRequest();
       
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

                var retour = JSON.parse(this.responseText);
                
                resultaQuantite.style.display = 'flex';
                resultaQuantite.innerHTML = retour.msg_retour;

                if (retour.success){

                    btnReservation.onclick = function reservation(){
                        var car_user = quantite.getAttribute('car-user');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                
                                var retour = JSON.parse(this.responseText);
                
                                if (retour.msg_success){
                                    
                                    resultaQuantite.style.display='none';
                                    resultat_reservation.style.display = 'flex';
                                    resultat_reservation.innerHTML = retour.msg_success;
                
                                } else if (retour.msg_echec) {
                
                                    resultat_reservation.style.display = 'flex';
                                    resultat_reservation.innerHTML = retour.msg_echec;
                
                                }      
                            }
                        }
                
                        xhr.open("POST", "../../../controleur/page_produit/reservation_achatControleur.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                
                        var params = 
                            "choixquantite=" + quantite.value +
                            "&attributIdCarAchat=" + attributIdCarAchat +
                            "&username=" + car_user;
                
                        xhr.send(params);
                    };

                } else {

                    btnReservation.onclick = function (){return false};

                }      
            }
        }

        xhr.open("POST", "../../../controleur/page_produit/page_produit_achatControleur.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        var params = 
            "quantite=" + quantite.value +
            "&attributIdCarAchat=" + attributIdCarAchat;

        xhr.send(params);
    }

    function favorisAchat(){

        var attributIdCarAchat = quantite.getAttribute('car-id-achat');
        var resultat_reservation = document.getElementById('resultat_reservation_achat');

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

                var retour = JSON.parse(this.responseText);

                if (retour.success){

                    resultat_reservation.style.display = 'flex';
                    resultat_reservation.innerHTML = retour.success;

                } else if (retour.echec) {

                    resultat_reservation.style.display = 'flex';
                    resultat_reservation.innerHTML = retour.echec;

                }      
            }
        }

        xhr.open("POST", "../../../controleur/page_produit/favoris_achatControleur.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        var params = 
            "idCarAchat=" + attributIdCarAchat;

        xhr.send(params);
    };

    
        

/**-------- GESTION CLIENT -----------**/

// INSCRIPTION

// CONNEXION 

var connexion = document.getElementById('submit_connexion');
	connexion.style.display = "none";

	function connexionUser (){
		var username = document.querySelector('input[name=username]').value;
		var password = document.getElementById('password').value;
		var msg = document.getElementById("msg");

		var xhr = new XMLHttpRequest();
		
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var retour = JSON.parse(this.responseText);

				if(retour.msg){
					msg.innerHTML = retour.msg;
				}

				if (retour.correct){
					msg.style.display = 'none';
				}
			}	
		};                    

		xhr.open("POST", "../../../controleur/gestion_client/connexionControleur.php", true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        var params = 
            "username=" + username +
			"&password=" + password;

		xhr.send(params);

	};

	function connect (){
		var username = document.querySelector('input[name=username]').value;
		var password = document.getElementById('password').value;
		

		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var retour = JSON.parse(this.responseText);

                if(retour.msg){
					msg.innerHTML = retour.msg;
				}

				if(retour.utilisateurs){
                    window.location.replace('mon-compte.php');
				}
			}	
		};                    

		xhr.open("POST", "../../../controleur/gestion_client/soumissionControleur.php", true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		var params = 
			"username=" + username +
			"&password=" + password;

		xhr.send(params);
	}
